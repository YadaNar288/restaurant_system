<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Orders List</title>

<link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background-color: #FFF7E6;
    color: #5A4635;
    display: flex;
}

/* Sidebar */
.sidebar {
    width: 220px;
    background: #fff3e0;
    padding: 20px;
    margin: 20px 0;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(198,124,65,0.2);
    position: sticky;
    top: 20px;
    height: fit-content;
}
.sidebar h4 {
    margin-bottom: 15px;
    color: #C67C41;
}
.sidebar ul {
    list-style: none;
    padding: 0;
}
.sidebar ul li {
    margin: 12px 0;
    padding: 8px 12px;
    border-radius: 10px;
    transition: 0.3s;
}
.sidebar ul li a {
    text-decoration: none;
    color: inherit;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
}
.sidebar ul li:hover, .sidebar ul li.active {
    background: #C67C41;
    color: #fff;
    transform: translateX(5px);
}

/* Main content */
.main-content {
    flex: 1;
    padding: 30px;
    max-width: 1000px;
    margin: 20px;
}

/* Header */
.main-content h2 {
    color: #C67C41;
    text-align: center;
    margin-bottom: 20px;
}

/* Add button */
.add-btn {
    display: inline-block;
    margin-bottom: 20px;
    padding: 8px 16px;
    border-radius: 25px;
    background: #C67C41;
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
}
.add-btn:hover {
    background: #ff2e6f;
}

/* Table styling */
table {
    width: 100%;
    border-collapse: collapse;
    background: #fff3e0;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(198,124,65,0.2);
}
thead {
    background: #C67C41;
    color: #fff;
}
thead th {
    padding: 12px;
    text-align: left;
}
tbody td {
    padding: 12px;
    border-bottom: 1px solid #e0cfc1;
}

/* Status badge */
.badge {
    padding: 5px 12px;
    border-radius: 20px;
    font-weight: 600;
    color: #fff;
    text-transform: capitalize;
}
.badge-pending { background: #f39c12; }
.badge-in_progress { background: #3498db; }
.badge-done { background: #27ae60; }

/* Actions */
.actions a, .actions button {
    display: inline-block;
    margin-right: 5px;
    padding: 6px 10px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: 0.3s;
}
.actions a { background: #C67C41; color: #fff; }
.actions a:hover { background: #ff2e6f; }
.actions button { background: #ff2e6f; color: #fff; }
.actions button:hover { background: #C67C41; }

/* Pagination */
.pagination {
    margin-top: 20px;
    justify-content: center;
    display: flex;
    list-style: none;
    padding-left: 0;
}
.pagination li a, .pagination li span {
    margin: 0 5px;
    padding: 6px 12px;
    border-radius: 6px;
    background: #fff;
    border: 1px solid #C67C41;
    color: #5A4635;
    text-decoration: none;
}
.pagination li.active span {
    background: #C67C41;
    color: #fff;
    border-color: #C67C41;
}
.pagination li a:hover {
    background: #ff2e6f;
    color: #fff;
    border-color: #ff2e6f;
}
</style>
</head>
<body>

{{-- Sidebar --}}
<div class="sidebar">
    <h4>Menu</h4>
    <ul>
       
        <li class="{{ request()->is('kitchen/dishes*') ? 'active' : '' }}">
            <a href="{{ route('kitchen.dishes') }}"><i class="fa-solid fa-bowl-food"></i> Dishes</a>
        </li>
        <li class="{{ request()->is('kitchen/orders*') ? 'active' : '' }}">
            <a href="{{ route('kitchen.orders') }}"><i class="fa-solid fa-receipt"></i> Orders</a>
        </li>
        <li class="{{ request()->is('kitchen/stats*') ? 'active' : '' }}">
            <a href="{{ route('kitchen.stats') }}"><i class="fa-solid fa-chart-line"></i> Status</a>
        </li>
        <li class="{{ request()->is('kitchen/settings*') ? 'active' : '' }}">
            <a href="{{ route('kitchen.settings') }}"><i class="fa-solid fa-cog"></i> Settings</a>
        </li>
    </ul>
</div>

{{-- Main content --}}
<div class="main-content">
    <h2>Orders List</h2>

    @if(session('success'))
        <p style="color:green; text-align:center; font-weight:600">{{ session('success') }}</p>
    @endif

    <a href="{{ route('kitchen.orders.create') }}" class="add-btn"><i class="fa-solid fa-plus"></i> Add New Order</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Table</th>
                <th>Items</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->table_number }}</td>
                <td>
                    @foreach($order->items as $item)
                        {{ \App\Models\Dishes::find($item)->name ?? 'N/A' }}{{ !$loop->last ? ',' : '' }}
                    @endforeach
                </td>
                <td>
                    <span class="badge badge-{{ $order->status }}">{{ $order->status }}</span>
                </td>
                <td class="actions">
                    <a href="{{ route('kitchen.orders.edit', $order->id) }}"><i class="fa-solid fa-pen"></i> Edit</a>
                    <form action="{{ route('kitchen.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete?')"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $orders->links() }}
</div>

</body>
</html>

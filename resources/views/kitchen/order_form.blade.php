<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ isset($order) ? 'Edit Order' : 'Add New Order' }}</title>

<link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: #FFF7E6;
    color: #5A4635;
    display: flex;
    min-height: 100vh;
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
    max-width: 800px;
    margin: 20px;
}

/* Card */
.card {
    background: #fff3e0;
    padding: 30px 25px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(198,124,65,0.2);
}

/* Header */
.card h2 {
    text-align: center;
    color: #C67C41;
    margin-bottom: 25px;
}

/* Labels and Inputs */
label {
    display: block;
    margin-bottom: 6px;
    font-weight: 500;
}
input, select, textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 18px;
    border-radius: 10px;
    border: 1px solid #C67C41;
    background: #FFF7E6;
    color: #5A4635;
    font-size: 1rem;
    transition: 0.3s;
}
input:focus, select:focus, textarea:focus {
    border-color: #ff2e6f;
    outline: none;
}

/* Multi-select hint */
.small-text {
    font-size: 0.85rem;
    color: #C67C41;
    margin-top: -12px;
    margin-bottom: 12px;
}

/* Button */
button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 25px;
    background: #C67C41;
    color: #fff;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s;
}
button:hover {
    background: #ff2e6f;
}

/* Validation errors */
.errors {
    background: #ff2e6f33;
    padding: 12px;
    border-radius: 10px;
    margin-bottom: 15px;
}
.errors li {
    color: #ff2e6f;
}
</style>
</head>
<body>

{{-- Sidebar --}}
<div class="sidebar">
    <h4>Menu</h4>
    <ul>
        <li class="{{ request()->is('kitchen') ? 'active' : '' }}">
            <a href="{{ route('kitchen.dashboard') }}"><i class="fa-solid fa-house"></i> Dashboard</a>
        </li>
        <li class="{{ request()->is('kitchen/dishes*') ? 'active' : '' }}">
            <a href="{{ route('kitchen.dishes') }}"><i class="fa-solid fa-bowl-food"></i> Dishes</a>
        </li>
        <li class="{{ request()->is('kitchen/orders*') ? 'active' : '' }}">
            <a href="{{ route('kitchen.orders') }}"><i class="fa-solid fa-receipt"></i> Orders</a>
        </li>
        <li class="{{ request()->is('kitchen/stats*') ? 'active' : '' }}">
            <a href="{{ route('kitchen.stats') }}"><i class="fa-solid fa-chart-line"></i> Stats</a>
        </li>
        <li class="{{ request()->is('kitchen/settings*') ? 'active' : '' }}">
            <a href="{{ route('kitchen.settings') }}"><i class="fa-solid fa-cog"></i> Settings</a>
        </li>
    </ul>
</div>

{{-- Main content --}}
<div class="main-content">
    <div class="card">
        <h2>{{ isset($order) ? 'Edit Order' : 'Add New Order' }}</h2>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($order) ? route('kitchen.orders.update', $order->id) : route('kitchen.orders.store') }}" method="POST">
            @csrf
            @if(isset($order))
                @method('PUT')
            @endif

            {{-- Table Number --}}
            <label for="table_number">Table Number</label>
            <input type="text" name="table_number" id="table_number" value="{{ old('table_number', $order->table_number ?? '') }}" placeholder="Table # or Takeaway" required>

            {{-- Dishes --}}
            <label for="items">Select Dishes</label>
            <select name="items[]" id="items" multiple required>
                @foreach($dishes as $dish)
                    <option value="{{ $dish->id }}" 
                        {{ (isset($order) && in_array($dish->id, $order->items ?? [])) ? 'selected' : '' }}>
                        {{ $dish->name }}
                    </option>
                @endforeach
            </select>
            <span class="small-text">Hold Ctrl (Cmd on Mac) to select multiple dishes</span>

            {{-- Status --}}
            <label for="status">Order Status</label>
            <select name="status" id="status" required>
                <option value="pending" {{ (old('status', $order->status ?? '') == 'pending') ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ (old('status', $order->status ?? '') == 'in_progress') ? 'selected' : '' }}>In Progress</option>
                <option value="done" {{ (old('status', $order->status ?? '') == 'done') ? 'selected' : '' }}>Done</option>
            </select>

            <button type="submit">{{ isset($order) ? 'Update Order' : 'Add Order' }}</button>
        </form>
    </div>
</div>

</body>
</html>

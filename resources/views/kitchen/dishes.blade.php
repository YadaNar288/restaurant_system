<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dish Management</title>

<link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    /* Cream Theme */
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #FFF7E6;
        color: #5A4635;
        display: flex;
    }

    /* Navbar */
    .app-header {
        width: 100%;
        padding: 15px 30px;
        background: #ffffff;
        box-shadow: 0 4px 15px rgba(198,124,65,0.2);
        position: fixed;
        top: 0;
        z-index: 2000;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .app-header h2 {
        margin: 0;
        font-size: 28px;
        color: #C67C41;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Layout */
    .dashboard-wrapper {
        display: flex;
        padding-top: 80px;
        gap: 20px;
        width: 100%;
    }

    /* Sidebar */
    .left-sidebar {
        width: 220px;
        padding: 20px;
        background: #fff3e0;
        border-radius: 15px;
        margin: 15px 0;
        box-shadow: 0 4px 15px rgba(198,124,65,0.2);
        height: fit-content;
        position: sticky;
        top: 80px;
    }
    .left-sidebar h4 {
        font-weight: 600;
        margin-bottom: 15px;
        color: #C67C41;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .left-sidebar ul {
        list-style: none;
        padding: 0;
    }
    .left-sidebar ul li {
        margin: 12px 0;
        cursor: pointer;
        transition: 0.3s;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border-radius: 10px;
    }
    .left-sidebar ul li:hover, .left-sidebar ul li.active {
        background: #C67C41;
        color: #fff;
        transform: translateX(5px);
    }

    /* Dish Cards */
    .dish-card {
        border-radius: 15px;
        background: #fff;
        color: #5A4635;
        box-shadow: 0 4px 15px rgba(198,124,65,0.2);
        padding: 15px;
        transition: 0.3s;
    }
    .dish-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(198,124,65,0.3);
    }

    .dish-img {
        width: 100%;
        height: 140px;
        border-radius: 12px;
        object-fit: cover;
        border: 1px solid #C67C41;
    }

    /* Badge */
    .badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: 600;
        color: #fff;
    }
    .badge-success { background: #27ae60; }
    .badge-danger { background: #ff2e6f; }

    /* Buttons */
    .btn {
        padding: 8px 16px;
        border-radius: 25px;
        border: none;
        background: #C67C41;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }
    .btn:hover {
        background: #ff2e6f;
        transform: translateY(-2px);
    }

    /* Content */
    .content-wrapper {
        flex: 1;
        padding: 20px 30px;
    }

    @media (max-width: 768px) {
        .dashboard-wrapper {
            flex-direction: column;
        }
        .left-sidebar {
            width: 100%;
            margin: 0 0 15px 0;
        }
    }
</style>
</head>
<body>

{{-- NAVBAR --}}
<nav class="app-header">
    <h2><i class="fa-solid fa-bowl-food"></i> Kitchen Dashboard</h2>
</nav>

<div class="dashboard-wrapper">

    {{-- LEFT SIDEBAR --}}
    <div class="left-sidebar">
        <h4>Menu</h4>
        <ul>
            <li><a href="{{ route('dishes.create') }}" style="color: inherit; text-decoration: none;"><i class="fa-solid fa-plus"></i> Create Dishes</a></li>
            <li><a href="{{ route('kitchen.dishes') }}" style="color: inherit; text-decoration: none;"><i class="fa-solid fa-bowl-food"></i> Dishes</a></li>
            <li><a href="{{ route('kitchen.orders') }}" style="color: inherit; text-decoration: none;"><i class="fa-solid fa-receipt"></i> Orders</a></li>
            <li><a href="{{ route('kitchen.stats') }}" style="color: inherit; text-decoration: none;"><i class="fa-solid fa-chart-line"></i> Stats</a></li>
            <li><a href="{{ route('kitchen.settings') }}" style="color: inherit; text-decoration: none;"><i class="fa-solid fa-cog"></i> Settings</a></li>
        </ul>

        <h4>Categories</h4>
        <ul>
            <li class="{{ request('category') == '' ? 'active' : '' }}">
                <a href="{{ route('kitchen.dishes') }}" style="color: inherit; text-decoration: none;">All</a>
            </li>
            @foreach($categories as $category)
                <li class="{{ request('category') == $category->id ? 'active' : '' }}">
                    <a href="{{ route('kitchen.dishes', ['category' => $category->id]) }}" style="color: inherit; text-decoration: none;">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="content-wrapper">
        <div class="row g-4">
            @forelse($dishes as $dish)
            <div class="col-md-3 col-sm-6">
                <div class="dish-card">
                    <img src="{{ $dish->image ? asset('images/dishes/' . $dish->image) : 'https://source.unsplash.com/250x150/?food' }}" class="dish-img">
                    <h5 class="mt-2">{{ $dish->name }}</h5>
                    <p>{{ $dish->description }}</p>
                    <span class="badge {{ $dish->status == 'available' ? 'badge-success' : 'badge-danger' }}">
                        {{ ucfirst($dish->status) }}
                    </span>

                    <div class="mt-2">
                        <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-sm"><i class="fa-solid fa-pen"></i></a>

                        <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
                <p>No dishes found in this category.</p>
            @endforelse
        </div>
    </div>
</div>

<script src="{{ asset('dist/js/adminlte.js') }}"></script>
</body>
</html>

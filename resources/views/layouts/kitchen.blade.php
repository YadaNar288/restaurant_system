<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Kitchen Dashboard')</title>

<link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
/* --- Body --- */
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: #FFF7E6;
    color: #5A4635;
    min-height: 100vh;
    display: flex;
}

/* --- Navbar --- */
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

/* --- Dashboard Layout --- */
.dashboard-wrapper {
    display: flex;
    padding-top: 80px;
    gap: 20px;
    width: 100%;
}

/* --- Sidebar --- */
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

/* --- Content --- */
.content-wrapper {
    flex: 1;
    padding: 20px 30px;
}

/* --- Buttons --- */
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
            <li class="{{ request()->routeIs('dishes.create') ? 'active' : '' }}">
                <a href="{{ route('dishes.create') }}" style="color: inherit; text-decoration: none;">
                    <i class="fa-solid fa-plus"></i> Create Dishes
                </a>
            </li>
            <li class="{{ request()->routeIs('kitchen.dishes') ? 'active' : '' }}">
                <a href="{{ route('kitchen.dishes') }}" style="color: inherit; text-decoration: none;">
                    <i class="fa-solid fa-bowl-food"></i> Dishes
                </a>
            </li>
            <li class="{{ request()->routeIs('kitchen.orders') ? 'active' : '' }}">
                <a href="{{ route('kitchen.orders') }}" style="color: inherit; text-decoration: none;">
                    <i class="fa-solid fa-receipt"></i> Orders
                </a>
            </li>
            <li class="{{ request()->routeIs('kitchen.stats') ? 'active' : '' }}">
                <a href="{{ route('kitchen.stats') }}" style="color: inherit; text-decoration: none;">
                    <i class="fa-solid fa-chart-line"></i> Stats
                </a>
            </li>
            <li class="{{ request()->routeIs('kitchen.settings') ? 'active' : '' }}">
                <a href="{{ route('kitchen.settings') }}" style="color: inherit; text-decoration: none;">
                    <i class="fa-solid fa-cog"></i> Settings
                </a>
            </li>
        </ul>

        @if(isset($categories))
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
        @endif
    </div>

    {{-- MAIN CONTENT --}}
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

<script src="{{ asset('dist/js/adminlte.js') }}"></script>
</body>
</html>

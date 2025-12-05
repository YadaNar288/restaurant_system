<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dish Management</title>

<link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    /* Neon Dark Theme */
    body {
        margin: 0;
        background: #0d0f1a;
        font-family: 'Segoe UI', Tahoma, sans-serif;
        color: #e0e6ff;
        display: flex;
    }

    /* Navbar */
    .app-header {
        background: #0d0f1a;
        border-bottom: 2px solid #00eaff;
        padding: 12px 20px;
        color: #00eaff;
        box-shadow: 0 0 15px #00eaff55;
        width: 100%;
        position: fixed;
        top: 0;
        z-index: 1000;
    }
    .navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
        color: #00eaff !important;
        text-shadow: 0 0 8px #00eaff;
    }

    /* Layout */
    .dashboard-wrapper {
        display: flex;
        gap: 20px;
        padding: 90px 20px 20px 20px;
        width: 100%;
    }

    .content-wrapper {
        flex: 1;
    }

    /* Left Sidebar */
    .left-sidebar {
        width: 230px;
        background: #111428;
        padding: 20px;
        border-radius: 15px;
        color: #00eaff;
        height: fit-content;
        position: sticky;
        top: 72px; /* navbar height */
        box-shadow: 0 0 15px #00eaff44;
    }
    .left-sidebar h4 {
        font-weight: bold;
        color: #00eaff;
        margin-bottom: 10px;
        text-shadow: 0 0 6px #00eaff;
    }
    .left-sidebar ul {
        list-style: none;
        padding: 0;
    }
    .left-sidebar ul li {
        margin: 12px 0;
        cursor: pointer;
        transition: 0.2s;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .left-sidebar ul li:hover {
        color: #ff2e6f;
        text-shadow: 0 0 8px #ff2e6f;
    }

    /* Dish Cards */
    .dish-card {
        border-radius: 15px;
        background: #111428;
        color: #e0e6ff;
        box-shadow: 0 0 10px #00eaff44;
        padding: 15px;
        transition: 0.3s;
        border: 1px solid #1f233a;
    }
    .dish-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 15px #00eaff88;
    }

    .dish-img {
        width: 100%;
        height: 140px;
        border-radius: 12px;
        object-fit: cover;
        border: 1px solid #00eaff33;
    }

    /* Add Dish Button */
    .add-btn {
        background: #00eaff;
        border: none;
        padding: 10px 18px;
        color: #0d0f1a;
        font-weight: bold;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 0 10px #00eaff88;
        transition: 0.2s;
    }
    .add-btn:hover {
        background: #ff2e6f;
        color: #fff;
        box-shadow: 0 0 12px #ff2e6f88;
    }

    /* Badge */
    .badge {
        color: #0d0f1a;
        border-radius: 15px;
        font-weight: 600;
        padding: 5px 12px;
    }
    .badge-success { background: #27ae60; box-shadow: 0 0 8px #27ae60; }
    .badge-danger { background: #ff2e6f; box-shadow: 0 0 8px #ff2e6f; }

    /* Footer */
    .app-footer {
        background: #0d0f1a;
        border-top: 2px solid #00eaff;
        box-shadow: 0 0 15px #00eaff55;
        color: #e0e6ff;
        text-align: center;
        padding: 12px 0;
        margin-top: 20px;
    }
</style>
</head>
<body>

{{-- NAVBAR --}}
<nav class="app-header navbar navbar-expand">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-bowl-food"></i> Neon Dish Management</a>
    </div>
</nav>

<div class="dashboard-wrapper">

    {{-- LEFT SIDEBAR --}}
    <div class="left-sidebar">
        <h4>Menu</h4>
        <ul>
            <li><i class="fa-solid fa-bowl-food"></i> Dishes</li>
            <li><i class="fa-solid fa-receipt"></i> Orders</li>
            <li><i class="fa-solid fa-chart-line"></i> Stats</li>
            <li><i class="fa-solid fa-cog"></i> Settings</li>
        </ul>

        <h4>Categories</h4>
        <ul>
            <li>🍗 Chicken</li>
            <li>🥩 Beef</li>
            <li>🍝 Pasta</li>
            <li>🍣 Seafood</li>
            <li>🥗 Salad</li>
        </ul>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="content-wrapper">

        <button class="add-btn">
            <i class="fa-solid fa-plus"></i> Add New Dish
        </button>

        <div class="row g-4">

            {{-- Dish 1 --}}
            <div class="col-md-3 col-sm-6">
                <div class="dish-card">
                    <img src="https://source.unsplash.com/250x150/?chicken" class="dish-img">
                    <h5 class="mt-2">Grilled Chicken</h5>
                    <p>Delicious grilled chicken with spices.</p>
                    <span class="badge badge-success">Available</span>

                    <div class="mt-2">
                        <button class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            </div>

            {{-- Dish 2 --}}
            <div class="col-md-3 col-sm-6">
                <div class="dish-card">
                    <img src="https://source.unsplash.com/250x150/?beef" class="dish-img">
                    <h5 class="mt-2">Beef Steak</h5>
                    <p>Tender steak with herbs.</p>
                    <span class="badge badge-danger">Unavailable</span>

                    <div class="mt-2">
                        <button class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            </div>

            {{-- Dish 3 --}}
            <div class="col-md-3 col-sm-6">
                <div class="dish-card">
                    <img src="https://source.unsplash.com/250x150/?pasta" class="dish-img">
                    <h5 class="mt-2">Seafood Pasta</h5>
                    <p>Creamy pasta with shrimp.</p>
                    <span class="badge badge-success">Available</span>

                    <div class="mt-2">
                        <button class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

{{-- FOOTER
<footer class="app-footer">
    Neon Restaurant Kitchen © 2025
</footer> --}}

<script src="{{ asset('dist/js/adminlte.js') }}"></script>
</body>
</html>

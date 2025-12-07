<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kitchen Dashboard</title>

<!-- AdminLTE 4 CSS -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    /* Modern Neon Theme */
    body, html {
        height: 100%;
        margin: 0;
        background-color: #0d0f1a;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #e0e6ff;
        display: flex;
    }

    /* Navbar */
    .app-header {
        background: #0d0f1a;
        border-bottom: 2px solid #00eaff;
        box-shadow: 0 0 15px #00eaff55;
        padding: 12px 20px;
        width: 100%;
        position: fixed;
        top: 0;
        z-index: 1000;
    }

    .navbar-brand {
        color: #00eaff !important;
        font-size: 1.5rem;
        text-shadow: 0 0 8px #00eaff;
    }

    /* Left Sidebar */
    .left-sidebar {
        width: 230px;
        background: #111428;
        padding: 20px;
        border-radius: 15px;
        color: #00eaff;
        box-shadow: 0 0 15px #00eaff44;
        position: sticky;
        top: 72px; /* navbar height */
        height: calc(100vh - 72px);
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

    /* Content Wrapper */
    .content-wrapper {
        flex: 1;
        padding: 100px 25px 25px 25px;
    }

    /* Neon Cards */
    .card {
        background: #111428;
        border-radius: 15px;
        border: 1px solid #1f233a;
        box-shadow: 0 0 10px #0d122f;
        transition: 0.3s;
    }

    .card:hover {
        box-shadow: 0 0 15px #00eaff88;
        transform: translateY(-5px);
    }

    .card-header {
        font-size: 1.1rem;
        color: #00eaff;
        border-bottom: 1px solid #22283f;
    }

    /* Stat Numbers */
    .card-body h4 {
        font-size: 2rem;
        color: #ff2e6f;
        text-shadow: 0 0 10px #ff2e6f;
    }

    /* Neon Badges */
    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        color: #0d0f1a;
    }

    .badge-pending { background: #ffb84d; box-shadow: 0 0 10px #ffb84d; }
    .badge-inprogress { background: #00eaff; box-shadow: 0 0 10px #00eaff; }
    .badge-done { background: #27ae60; box-shadow: 0 0 10px #27ae60; }

    /* Tables */
    table thead {
        background-color: #1a1e33;
        color: #00eaff;
        border-bottom: 2px solid #00eaff55;
    }
    table tbody tr { border-bottom: 1px solid #232842; }
    table tbody tr:hover { background-color: #14172b; }

    /* Footer */
    .app-footer {
        background: #0d0f1a;
        border-top: 2px solid #00eaff;
        box-shadow: 0 0 15px #00eaff55;
        text-align: center;
        padding: 12px;
        color: #e0e6ff;
    }
</style>
</head>
<body>

    <!-- Navbar -->
    <nav class="app-header navbar navbar-expand">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-bowl-food"></i> Neon Kitchen</a>
        </div>
    </nav>

    <!-- Left Sidebar -->
    <div class="left-sidebar">
        <h4>Menu</h4>
        <ul>
            <li><i class="fa-solid fa-bowl-food"></i> Dishes</li>
            <li><i class="fa-solid fa-receipt"></i> Orders</li>
            <li><i class="fa-solid fa-chart-line"></i> Stats</li>
            <li><i class="fa-solid fa-cog"></i> Settings</li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content-wrapper container-fluid">

        <h3 style="color:#7d5fff; text-shadow:0 0 10px #7d5fff;">Overview</h3>

        <div class="row g-4 mb-4">

            <!-- Pending Orders -->
            <div class="col-md-3 col-sm-6">
                <div class="card p-3">
                    <div class="card-header"><i class="fa-solid fa-hourglass-start"></i> Pending Orders</div>
                    <div class="card-body">
                        <h4>12</h4>
                        <p style="color:#b5bde7;">Waiting</p>
                    </div>
                </div>
            </div>

            <!-- In Progress -->
            <div class="col-md-3 col-sm-6">
                <div class="card p-3">
                    <div class="card-header"><i class="fa-solid fa-fire-burner"></i> In Progress</div>
                    <div class="card-body">
                        <h4>8</h4>
                        <p style="color:#b5bde7;">Being prepared</p>
                    </div>
                </div>
            </div>

            <!-- Completed -->
            <div class="col-md-3 col-sm-6">
                <div class="card p-3">
                    <div class="card-header"><i class="fa-solid fa-check-circle"></i> Completed</div>
                    <div class="card-body">
                        <h4>20</h4>
                        <p style="color:#b5bde7;">Finished today</p>
                    </div>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="col-md-3 col-sm-6">
                <div class="card p-3">
                    <div class="card-header"><i class="fa-solid fa-list"></i> Total Orders</div>
                    <div class="card-body">
                        <h4>40</h4>
                        <p style="color:#b5bde7;">All orders</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <h3 style="color:#7d5fff; text-shadow:0 0 10px #7d5fff;">Recent Orders</h3>

        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Table</th>
                            <th>Items</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>101</td>
                            <td>5</td>
                            <td>Burger, Fries</td>
                            <td><span class="badge badge-pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>102</td>
                            <td>2</td>
                            <td>Pizza, Salad</td>
                            <td><span class="badge badge-inprogress">In Progress</span></td>
                        </tr>
                        <tr>
                            <td>103</td>
                            <td>Takeaway</td>
                            <td>Pasta</td>
                            <td><span class="badge badge-done">Done</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- <!-- Footer -->
    <footer class="app-footer">
        Neon Kitchen Dashboard © 2025
    </footer> --}}

    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
</body>
</html>

@extends('layouts.app')

@section('content')
<style>
    /* Neon Kitchen Theme */
    body, html {
        background-color: #0d0f1a;
        color: #e0e6ff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .dashboard-container {
        display: flex;
        gap: 20px;
        padding: 20px;
    }

    /* Left Sidebar */
    .left-sidebar {
        width: 220px;
        background: #111428;
        padding: 20px;
        border-radius: 15px;
        color: #00eaff;
        box-shadow: 0 0 15px #00eaff44;
        flex-shrink: 0;
        height: calc(100vh - 20px);
        position: sticky;
        top: 20px;
    }

    .left-sidebar h4 {
        margin-bottom: 15px;
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
        gap: 10px;
    }

    .left-sidebar ul li:hover {
        color: #ff2e6f;
        text-shadow: 0 0 8px #ff2e6f;
    }

    /* Content Wrapper */
    .content-wrapper {
        flex: 1;
    }

    .neon-card {
        background: #111428;
        border-radius: 15px;
        border: 1px solid #1f233a;
        box-shadow: 0 0 10px #0d122f;
        padding: 20px;
        transition: 0.3s;
        margin-bottom: 20px;
    }

    .neon-card:hover {
        box-shadow: 0 0 15px #00eaff88;
        transform: translateY(-5px);
    }

    .neon-card h4 {
        font-size: 2rem;
        color: #ff2e6f;
        text-shadow: 0 0 10px #ff2e6f;
    }

    .card-header {
        font-size: 1.1rem;
        color: #00eaff;
        border-bottom: 1px solid #22283f;
        margin-bottom: 10px;
    }

    table thead {
        background-color: #1a1e33;
        color: #00eaff;
        border-bottom: 2px solid #00eaff55;
    }

    table tbody tr:hover {
        background-color: #14172b;
    }

    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        color: #0d0f1a;
    }

    .badge-pending { background: #ffb84d; box-shadow: 0 0 10px #ffb84d; }
    .badge-inprogress { background: #00eaff; box-shadow: 0 0 10px #00eaff; }
    .badge-done { background: #27ae60; box-shadow: 0 0 10px #27ae60; }
</style>

<div class="dashboard-container">

    <!-- Left Sidebar -->
    <div class="left-sidebar">
        <h4>Menu</h4>
        <ul>
            <li><i class="fa-solid fa-bowl-food"></i> <a href="{{ route('kitchen.dishes') }}" style="color:inherit; text-decoration:none;">Dishes</a></li>
            <li><i class="fa-solid fa-receipt"></i> <a href="{{ route('kitchen.orders') }}" style="color:inherit; text-decoration:none;">Orders</a></li>
            <li><i class="fa-solid fa-chart-line"></i> <a href="{{ route('kitchen.stats') }}" style="color:inherit; text-decoration:none;">Stats</a></li>
            <li><i class="fa-solid fa-cog"></i> <a href="{{ route('kitchen.settings') }}" style="color:inherit; text-decoration:none;">Settings</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">

        <h3 style="color:#7d5fff; text-shadow:0 0 10px #7d5fff;">Overview</h3>

        <div class="row g-4 mb-4 d-flex flex-wrap">

            <!-- Pending Orders -->
            <div class="col-md-3 col-sm-6">
                <div class="neon-card">
                    <div class="card-header"><i class="fa-solid fa-hourglass-start"></i> Pending Orders</div>
                    <div class="card-body">
                        <h4>{{ $pending }}</h4>
                        <p style="color:#b5bde7;">Waiting</p>
                    </div>
                </div>
            </div>

            <!-- In Progress -->
            <div class="col-md-3 col-sm-6">
                <div class="neon-card">
                    <div class="card-header"><i class="fa-solid fa-fire-burner"></i> In Progress</div>
                    <div class="card-body">
                        <h4>{{ $inProgress }}</h4>
                        <p style="color:#b5bde7;">Being prepared</p>
                    </div>
                </div>
            </div>

            <!-- Completed -->
            <div class="col-md-3 col-sm-6">
                <div class="neon-card">
                    <div class="card-header"><i class="fa-solid fa-check-circle"></i> Completed</div>
                    <div class="card-body">
                        <h4>{{ $completed }}</h4>
                        <p style="color:#b5bde7;">Finished today</p>
                    </div>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="col-md-3 col-sm-6">
                <div class="neon-card">
                    <div class="card-header"><i class="fa-solid fa-list"></i> Total Orders</div>
                    <div class="card-body">
                        <h4>{{ $total }}</h4>
                        <p style="color:#b5bde7;">All orders</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <h3 style="color:#7d5fff; text-shadow:0 0 10px #7d5fff;">Recent Orders</h3>

        <div class="neon-card">
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
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->table_number ?? 'N/A' }}</td>
                            <td>
                                @foreach($order->items as $item)
                                    {{ $item->name }}@if(!$loop->last), @endif
                                @endforeach
                            </td>
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge badge-pending">Pending</span>
                                @elseif($order->status == 'in_progress')
                                    <span class="badge badge-inprogress">In Progress</span>
                                @else
                                    <span class="badge badge-done">Done</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- FontAwesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
@endsection
@extends('layouts.app')

@section('content')
<style>
    /* Neon Kitchen Theme */
    body, html {
        background-color: #0d0f1a;
        color: #e0e6ff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .dashboard-container {
        display: flex;
        gap: 20px;
        padding: 20px;
    }

    /* Left Sidebar */
    .left-sidebar {
        width: 220px;
        background: #111428;
        padding: 20px;
        border-radius: 15px;
        color: #00eaff;
        box-shadow: 0 0 15px #00eaff44;
        flex-shrink: 0;
        height: calc(100vh - 20px);
        position: sticky;
        top: 20px;
    }

    .left-sidebar h4 {
        margin-bottom: 15px;
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
        gap: 10px;
    }

    .left-sidebar ul li:hover {
        color: #ff2e6f;
        text-shadow: 0 0 8px #ff2e6f;
    }

    /* Content Wrapper */
    .content-wrapper {
        flex: 1;
    }

    .neon-card {
        background: #111428;
        border-radius: 15px;
        border: 1px solid #1f233a;
        box-shadow: 0 0 10px #0d122f;
        padding: 20px;
        transition: 0.3s;
        margin-bottom: 20px;
    }

    .neon-card:hover {
        box-shadow: 0 0 15px #00eaff88;
        transform: translateY(-5px);
    }

    .neon-card h4 {
        font-size: 2rem;
        color: #ff2e6f;
        text-shadow: 0 0 10px #ff2e6f;
    }

    .card-header {
        font-size: 1.1rem;
        color: #00eaff;
        border-bottom: 1px solid #22283f;
        margin-bottom: 10px;
    }

    table thead {
        background-color: #1a1e33;
        color: #00eaff;
        border-bottom: 2px solid #00eaff55;
    }

    table tbody tr:hover {
        background-color: #14172b;
    }

    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        color: #0d0f1a;
    }

    .badge-pending { background: #ffb84d; box-shadow: 0 0 10px #ffb84d; }
    .badge-inprogress { background: #00eaff; box-shadow: 0 0 10px #00eaff; }
    .badge-done { background: #27ae60; box-shadow: 0 0 10px #27ae60; }
</style>

<div class="dashboard-container">

    <!-- Left Sidebar -->
    <div class="left-sidebar">
        <h4>Menu</h4>
        <ul>
            <li><i class="fa-solid fa-bowl-food"></i> <a href="{{ route('kitchen.dishes') }}" style="color:inherit; text-decoration:none;">Dishes</a></li>
            <li><i class="fa-solid fa-receipt"></i> <a href="{{ route('kitchen.orders') }}" style="color:inherit; text-decoration:none;">Orders</a></li>
            <li><i class="fa-solid fa-chart-line"></i> <a href="{{ route('kitchen.stats') }}" style="color:inherit; text-decoration:none;">Stats</a></li>
            <li><i class="fa-solid fa-cog"></i> <a href="{{ route('kitchen.settings') }}" style="color:inherit; text-decoration:none;">Settings</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">

        <h3 style="color:#7d5fff; text-shadow:0 0 10px #7d5fff;">Overview</h3>

        <div class="row g-4 mb-4 d-flex flex-wrap">

            <!-- Pending Orders -->
            <div class="col-md-3 col-sm-6">
                <div class="neon-card">
                    <div class="card-header"><i class="fa-solid fa-hourglass-start"></i> Pending Orders</div>
                    <div class="card-body">
                        <h4>{{ $pending }}</h4>
                        <p style="color:#b5bde7;">Waiting</p>
                    </div>
                </div>
            </div>

            <!-- In Progress -->
            <div class="col-md-3 col-sm-6">
                <div class="neon-card">
                    <div class="card-header"><i class="fa-solid fa-fire-burner"></i> In Progress</div>
                    <div class="card-body">
                        <h4>{{ $inProgress }}</h4>
                        <p style="color:#b5bde7;">Being prepared</p>
                    </div>
                </div>
            </div>

            <!-- Completed -->
            <div class="col-md-3 col-sm-6">
                <div class="neon-card">
                    <div class="card-header"><i class="fa-solid fa-check-circle"></i> Completed</div>
                    <div class="card-body">
                        <h4>{{ $completed }}</h4>
                        <p style="color:#b5bde7;">Finished today</p>
                    </div>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="col-md-3 col-sm-6">
                <div class="neon-card">
                    <div class="card-header"><i class="fa-solid fa-list"></i> Total Orders</div>
                    <div class="card-body">
                        <h4>{{ $total }}</h4>
                        <p style="color:#b5bde7;">All orders</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <h3 style="color:#7d5fff; text-shadow:0 0 10px #7d5fff;">Recent Orders</h3>

        <div class="neon-card">
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
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->table_number ?? 'N/A' }}</td>
                            <td>
                                @foreach($order->items as $item)
                                    {{ $item->name }}@if(!$loop->last), @endif
                                @endforeach
                            </td>
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge badge-pending">Pending</span>
                                @elseif($order->status == 'in_progress')
                                    <span class="badge badge-inprogress">In Progress</span>
                                @else
                                    <span class="badge badge-done">Done</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- FontAwesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
@endsection

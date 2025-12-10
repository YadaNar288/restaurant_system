@extends('layouts.app')

@section('content')
<style>
    /* Cream Kitchen Theme */
    body, html {
        background-color: #fdf6e3; /* Creamy background */
        color: #333; /* Dark text */
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
        background: #fff8e1;
        padding: 20px;
        border-radius: 15px;
        color: #8b5e3c;
        box-shadow: 0 0 10px #d4c3a8;
        flex-shrink: 0;
        height: calc(100vh - 20px);
        position: sticky;
        top: 20px;
    }

    .left-sidebar h4 {
        margin-bottom: 15px;
        font-weight: bold;
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
        color: #ff8c42;
    }

    .left-sidebar a {
        color: inherit;
        text-decoration: none;
    }

    /* Content Wrapper */
    .content-wrapper {
        flex: 1;
    }

    .cream-card {
        background: #fffdf4;
        border-radius: 15px;
        border: 1px solid #e6d9b8;
        box-shadow: 0 0 10px #e6d9b8aa;
        padding: 20px;
        transition: 0.3s;
        margin-bottom: 20px;
    }

    .cream-card:hover {
        box-shadow: 0 0 15px #ffcc80aa;
        transform: translateY(-5px);
    }

    .cream-card h4 {
        font-size: 1.8rem;
        color: #d46a2f;
    }

    .card-header {
        font-size: 1.1rem;
        color: #b36b00;
        border-bottom: 1px solid #e6d9b8;
        margin-bottom: 10px;
    }

    table thead {
        background-color: #f3e8d0;
        color: #8b5e3c;
        border-bottom: 2px solid #d4c3a8;
    }

    table tbody tr:hover {
        background-color: #fff5e1;
    }

    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        color: #fff;
    }

    .badge-pending { background: #f0ad4e; }
    .badge-inprogress { background: #5bc0de; }
    .badge-done { background: #5cb85c; }
</style>

<div class="dashboard-container">

    <!-- Left Sidebar -->
    <div class="left-sidebar">
        <h4>Menu</h4>
        <ul>
            <li><i class="fa-solid fa-bowl-food"></i> <a href="{{ route('kitchen.dishes') }}">Dishes</a></li>
            <li><i class="fa-solid fa-receipt"></i> <a href="{{ route('kitchen.orders') }}">Orders</a></li>
            <li><i class="fa-solid fa-chart-line"></i> <a href="{{ route('kitchen.stats') }}">Stats</a></li>
            <li><i class="fa-solid fa-cog"></i> <a href="{{ route('kitchen.settings') }}">Settings</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">

        <h3 style="color:#d46a2f;">Overview</h3>

        <div class="row g-4 mb-4 d-flex flex-wrap">

            <!-- Pending Orders -->
            <div class="col-md-3 col-sm-6">
                <div class="cream-card">
                    <div class="card-header"><i class="fa-solid fa-hourglass-start"></i> Pending Orders</div>
                    <div class="card-body">
                        <h4>{{ $pending }}</h4>
                        <p>Waiting</p>
                    </div>
                </div>
            </div>

            <!-- In Progress -->
            <div class="col-md-3 col-sm-6">
                <div class="cream-card">
                    <div class="card-header"><i class="fa-solid fa-fire-burner"></i> In Progress</div>
                    <div class="card-body">
                        <h4>{{ $inProgress }}</h4>
                        <p>Being prepared</p>
                    </div>
                </div>
            </div>

            <!-- Completed -->
            <div class="col-md-3 col-sm-6">
                <div class="cream-card">
                    <div class="card-header"><i class="fa-solid fa-check-circle"></i> Completed</div>
                    <div class="card-body">
                        <h4>{{ $completed }}</h4>
                        <p>Finished today</p>
                    </div>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="col-md-3 col-sm-6">
                <div class="cream-card">
                    <div class="card-header"><i class="fa-solid fa-list"></i> Total Orders</div>
                    <div class="card-body">
                        <h4>{{ $total }}</h4>
                        <p>All orders</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <h3 style="color:#d46a2f;">Recent Orders</h3>

        <div class="cream-card">
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
                                    @if(is_object($item) && property_exists($item, 'name'))
                                        {{ $item->name }}
                                    @else
                                        {{ $item }}
                                    @endif
                                    @if(!$loop->last), @endif
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

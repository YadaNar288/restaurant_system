@extends('layouts.app')

@section('content')
<div class="main-wrapper">

    <!-- Sidebar -->
    <div class="sidebar">
        <h4><i class="fa-solid fa-bars"></i> Menu</h4>
        <ul>
            <li><i class="fa-solid fa-bowl-food"></i> Dishes</li>
            <li><i class="fa-solid fa-receipt"></i> Orders</li>
            <li><i class="fa-solid fa-chart-line"></i> Stats</li>
            <li><i class="fa-solid fa-cog"></i> Settings</li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h3>Overview</h3>
        <div class="row" style="display:flex; gap:20px; flex-wrap:wrap;">
            <div class="card" style="flex:1; min-width:200px;">
                <div class="card-header"><i class="fa-solid fa-hourglass-start"></i> Pending Orders</div>
                <div class="card-body">
                    <h4>{{ $pending }}</h4>
                    <p>Waiting</p>
                </div>
            </div>

            <div class="card" style="flex:1; min-width:200px;">
                <div class="card-header"><i class="fa-solid fa-fire-burner"></i> In Progress</div>
                <div class="card-body">
                    <h4>{{ $inProgress }}</h4>
                    <p>Being prepared</p>
                </div>
            </div>

            <div class="card" style="flex:1; min-width:200px;">
                <div class="card-header"><i class="fa-solid fa-check-circle"></i> Completed</div>
                <div class="card-body">
                    <h4>{{ $completed }}</h4>
                    <p>Finished today</p>
                </div>
            </div>

            <div class="card" style="flex:1; min-width:200px;">
                <div class="card-header"><i class="fa-solid fa-list"></i> Total Orders</div>
                <div class="card-body">
                    <h4>{{ $totalOrders }}</h4>
                    <p>All orders</p>
                </div>
            </div>
        </div>

        <h3>Recent Orders</h3>
        <table>
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Table</th>
                    <th>Items</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->table_no }}</td>
                    <td>{{ $order->items }}</td>
                    <td>
                        @php
                            $badge = match($order->status){
                                'pending' => 'badge-pending',
                                'inprogress' => 'badge-inprogress',
                                'done' => 'badge-done',
                            };
                        @endphp
                        <span class="badge {{ $badge }}">{{ ucfirst($order->status) }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

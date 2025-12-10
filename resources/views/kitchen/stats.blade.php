@extends('layouts.kitchen') {{-- optional, if you have a main layout --}}

@section('content')
<div class="content-wrapper">
    <h2>Kitchen Status</h2>

    <div style="display:flex; gap:20px; flex-wrap:wrap; margin-top:20px;">
        <div style="flex:1; padding:20px; background:#fff3e0; border-radius:12px; text-align:center; box-shadow:0 4px 15px rgba(198,124,65,0.2);">
            <h3>Total Orders</h3>
            <p style="font-size:2rem; color:#C67C41">{{ $stats['total'] }}</p>
        </div>
        <div style="flex:1; padding:20px; background:#fff3e0; border-radius:12px; text-align:center; box-shadow:0 4px 15px rgba(198,124,65,0.2);">
            <h3>Pending</h3>
            <p style="font-size:2rem; color:#f39c12">{{ $stats['pending'] }}</p>
        </div>
        <div style="flex:1; padding:20px; background:#fff3e0; border-radius:12px; text-align:center; box-shadow:0 4px 15px rgba(198,124,65,0.2);">
            <h3>In Progress</h3>
            <p style="font-size:2rem; color:#3498db">{{ $stats['in_progress'] }}</p>
        </div>
        <div style="flex:1; padding:20px; background:#fff3e0; border-radius:12px; text-align:center; box-shadow:0 4px 15px rgba(198,124,65,0.2);">
            <h3>Completed</h3>
            <p style="font-size:2rem; color:#27ae60">{{ $stats['done'] }}</p>
        </div>
    </div>
</div>
@endsection

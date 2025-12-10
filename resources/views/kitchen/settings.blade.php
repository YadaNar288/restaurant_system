@extends('layouts.kitchen')

@section('content')
<div class="content-wrapper">
    <h2>Kitchen Settings</h2>

    <div style="background:#fff3e0; padding:25px; border-radius:15px; box-shadow:0 4px 15px rgba(198,124,65,0.2); max-width:600px;">
        <form>
            <label for="kitchen_name">Kitchen Name</label>
            <input type="text" id="kitchen_name" placeholder="Enter kitchen name" style="width:100%; padding:10px; border-radius:8px; border:1px solid #C67C41; margin-bottom:15px;">

            <label for="theme_color">Theme Color</label>
            <input type="color" id="theme_color" value="#C67C41" style="width:100%; height:50px; margin-bottom:15px; border:none;">

            <button type="submit" style="background:#C67C41; color:#fff; padding:10px 20px; border-radius:10px; border:none; cursor:pointer;">Save Settings</button>
        </form>
    </div>
</div>
@endsection

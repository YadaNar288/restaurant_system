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
    margin:0;
    font-family:'Poppins', sans-serif;
    background:#FFF7E6;
    color:#5A4635;
}
.container {
    max-width:600px;
    margin:100px auto;
    padding:25px;
    background:#fff3e0;
    border-radius:12px;
    box-shadow:0 4px 15px rgba(198,124,65,0.2);
}
h2 {
    color:#C67C41;
    text-align:center;
    margin-bottom:20px;
}
label {
    display:block;
    margin-bottom:6px;
    color:#5A4635;
    font-weight:500;
}
input, select, textarea {
    width:100%;
    padding:10px;
    margin-bottom:15px;
    border-radius:8px;
    border:1px solid #C67C41;
    background:#FFF7E6;
    color:#5A4635;
    font-size:1rem;
}
button {
    background:#C67C41;
    color:#fff;
    font-weight:bold;
    padding:10px 20px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    transition:0.2s;
}
button:hover {
    background:#ff2e6f;
}
</style>
</head>
<body>

<div class="container">
    <h2>{{ isset($order) ? 'Edit Order' : 'Add New Order' }}</h2>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div style="background:#ff2e6f33; padding:10px; border-radius:8px; margin-bottom:15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:#ff2e6f">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($order) ? route('kitchen.orders.update', $order->id) : route('kitchen.orders.store') }}" method="POST">

    @csrf
    @if(isset($order))
        @method('PUT')
    @endif

    <label for="table_number">Table Number</label>
    <input type="text" name="table_number" id="table_number" value="{{ old('table_number', $order->table_number ?? '') }}" required>

    <label for="items">Select Dishes</label>
    <select name="items[]" id="items" multiple required>
        @foreach($dishes as $dish)
            <option value="{{ $dish->id }}" {{ (isset($order) && in_array($dish->id, $order->items ?? [])) ? 'selected' : '' }}>
                {{ $dish->name }}
            </option>
        @endforeach
    </select>

    <label for="status">Order Status</label>
    <select name="status" id="status" required>
        <option value="pending" {{ (old('status', $order->status ?? '') == 'pending') ? 'selected' : '' }}>Pending</option>
        <option value="in_progress" {{ (old('status', $order->status ?? '') == 'in_progress') ? 'selected' : '' }}>In Progress</option>
        <option value="done" {{ (old('status', $order->status ?? '') == 'done') ? 'selected' : '' }}>Done</option>
    </select>

    <button type="submit">{{ isset($order) ? 'Update Order' : 'Add Order' }}</button>
</form>

</div>

</body>
</html>

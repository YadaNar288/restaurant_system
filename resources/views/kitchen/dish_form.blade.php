<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ isset($dish) ? 'Edit Dish' : 'Add New Dish' }}</title>

<link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #FFF7E6;
        color: #5A4635;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding-top: 80px; /* navbar space */
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

    .container {
        max-width: 600px;
        width: 100%;
        background: #fff3e0;
        padding: 25px 30px;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(198,124,65,0.2);
    }

    h2 {
        text-align: center;
        font-size: 24px;
        color: #C67C41;
        margin-bottom: 25px;
        font-weight: 700;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
    }

    input, select, textarea {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 15px;
        border-radius: 10px;
        border: 1px solid #C67C41;
        background: #fff;
        color: #5A4635;
        font-size: 1rem;
    }

    input[type="file"] {
        padding: 5px;
    }

    textarea {
        resize: vertical;
    }

    .img-preview {
        width: 100%;
        max-height: 200px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 15px;
        border: 1px solid #C67C41;
    }

    button {
        background: #C67C41;
        color: #fff;
        font-weight: 600;
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s;
        display: block;
        width: 100%;
        font-size: 1rem;
    }

    button:hover {
        background: #ff2e6f;
        transform: translateY(-2px);
    }

    /* Error box */
    .errors {
        background: #ff2e6f33;
        padding: 10px 12px;
        border-radius: 10px;
        margin-bottom: 15px;
    }
    .errors ul {
        margin: 0;
        padding-left: 18px;
    }
    .errors li {
        color: #ff2e6f;
    }
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

</style>
</head>
<body>
    <nav class="app-header">
    <h2><i class="fa-solid fa-bowl-food"></i> Kitchen Dashboard</h2>
</nav>

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

<div class="container">
    <h2>{{ isset($dish) ? 'Edit Dish' : 'Add New Dish' }}</h2>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($dish) ? route('dishes.update', $dish->id) : route('dishes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($dish))
            @method('PUT')
        @endif

        <label for="name">Dish Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $dish->name ?? '') }}" required>

        <label for="description">Description</label>
        <textarea name="description" id="description" rows="3">{{ old('description', $dish->description ?? '') }}</textarea>

        <label for="categories_id">Category</label>
        <select name="categories_id" id="categories_id" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (old('categories_id', $dish->categories_id ?? '') == $category->id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label for="status">Status</label>
        <select name="status" id="status" required>
            <option value="available" {{ (old('status', $dish->status ?? '') == 'available') ? 'selected' : '' }}>Available</option>
            <option value="unavailable" {{ (old('status', $dish->status ?? '') == 'unavailable') ? 'selected' : '' }}>Unavailable</option>
        </select>

        <label for="image">Dish Image</label>
        <input type="file" name="image" id="image" accept="image/*">
        @if(isset($dish) && $dish->image)
            <img src="{{ asset('images/dishes/' . $dish->image) }}" alt="Current Image" class="img-preview">
        @endif

        <button type="submit">{{ isset($dish) ? 'Update Dish' : 'Add Dish' }}</button>
    </form>
</div>

</body>
</html>

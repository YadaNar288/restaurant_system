<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use App\Models\Categories;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dishes::all(); // fetch all dishes
        return view('kitchen.dishes', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Categories::all(); // fetch all categories
    return view('kitchen.dish_form', compact('categories')); // pass to view
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:available,unavailable',
            'image' => 'nullable|image|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/dishes'), $imageName);
        } else {
            $imageName = null;
        }

        // Create dish
        Dishes::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $imageName,
            'categories_id' => $request->categories_id,
        ]);

        return redirect()->route('dishes.index')->with('success', 'Dish added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dish = Dishes::findOrFail($id);
        return view('kitchen.show_dish', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
    $dish = Dishes::findOrFail($id);
    $categories = Categories::all(); // fetch all categories
    return view('kitchen.dish_form', compact('dish', 'categories')); // pass both
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dish = Dishes::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:available,unavailable',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/dishes'), $imageName);
            $dish->image = $imageName;
        }

        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->status = $request->status;
        $dish->save();

        return redirect()->route('dishes.index')->with('success', 'Dish updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish = Dishes::findOrFail($id);

        // Delete image file if exists
        if ($dish->image && file_exists(public_path('images/dishes/' . $dish->image))) {
            unlink(public_path('images/dishes/' . $dish->image));
        }

        $dish->delete();

        return redirect()->route('dishes.index')->with('success', 'Dish deleted successfully!');
    }
}

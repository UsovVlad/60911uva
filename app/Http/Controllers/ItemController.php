<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('items', [
            'items' => Item::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item_create',
        ['categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:items|max:255',
            'price' => 'required|integer',
            'category_id' => 'integer'
        ]);
        $item = new Item($validated);
        $item->save();
        return redirect('/item');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('item_edit', [
            'item' => Item::all()->where('id', $id)->first(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'category_id' => 'integer'
        ]);
        $item = Item::all()->where('id', $id)->first();
        $item->name = $validated['name'];
        $item->price = $validated['price'];
        $item->category_id = $validated['category_id'];
        $item->save();
        return redirect('/item');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    // Удаляем все зависимости в таблице item_order
    \DB::table('item_order')->where('item_id', $id)->delete();
    Item::destroy($id);
    return redirect('/item');
    }
}

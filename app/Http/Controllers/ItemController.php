<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $perpage = $request->get('perpage', 2);
        return view('items', [
            'items' => Item::paginate($perpage)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('item_create',
        ['categories' => Category::all()
        ]);
    }

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

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return view('item_edit', [
            'item' => Item::all()->where('id', $id)->first(),
            'categories' => Category::all()
        ]);
    }

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

    public function destroy(string $id)
    {
        if (! Gate::allows('destroy-item', Item::all()->where('id', $id)->first())){
            return redirect('login')->withErrors(['success' => 'У вас нет разрешения на удаление товара']);
    }
    \DB::table('item_order')->where('item_id', $id)->delete();
    Item::destroy($id);
    return redirect('/item');
    }
}

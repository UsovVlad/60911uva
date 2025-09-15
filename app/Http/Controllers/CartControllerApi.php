<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
class CartControllerApi extends Controller
{
    public function index()
    {
        return response(Cart::all());
    }
    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        return response(Cart::find($id));
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
}

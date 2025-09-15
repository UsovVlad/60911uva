<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryControllerApi extends Controller
{
    public function index()
    {
        return response(Category::all());
        //return response()->json(['message' => 'Работает!']);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return response(Category::find($id));
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

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryControllerApi extends Controller
{
    public function index(Request $request)
    {
        return response(Category::limit($request->perpage ?? 5)
            ->offset(($request->perpage ?? 5)*($request->page ?? 0))
            ->get());
    }

    public function total()
    {
        return response(Category::all()->count());
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

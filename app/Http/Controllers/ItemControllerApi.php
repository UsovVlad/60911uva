<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemControllerApi extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perpage', 5);
        $page = $request->input('page', 0);

        $items = Item::with('category')
            ->skip($page * $perPage)
            ->take($perPage)
            ->get();

        return response()->json($items);
    }

    public function total()
    {
        $count = Item::count();
        return response()->json($count, Response::HTTP_OK);
    }

    public function show($id)
    {
        $item = Item::find($id);
        return $item ? response()
            ->json($item) : response()
            ->json(['message' => 'Not found'], Response::HTTP_NOT_FOUND);
    }
}

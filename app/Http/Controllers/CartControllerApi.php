<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartControllerApi extends Controller
{
    public function index()// получить все корзины
    {
        return response(Cart::all());
    }

    public function show(string $id)// получить корзину по ID
    {
        return response(Cart::find($id));
    }

    public function getCartByUserId($userId)// получить корзину по ID пользователя
    {
        $cart = Cart::where('user_id', $userId)->first();

        if (!$cart) {
            $cart = Cart::create(['user_id' => $userId]);
        }

        return response()->json($cart);
    }

    public function getItems($cartId, Request $request)// получить товары корзины (с пагинацией)
    {
        $perpage = $request->query('perpage', 5);
        $page = $request->query('page', 0);

        $items = CartItem::where('cart_id', $cartId)
            ->with('item')
            ->limit($perpage)
            ->offset($perpage * $page)
            ->get();

        return response()->json($items);
    }

    public function getItemsTotal($cartId)// получить общее количество элементов корзины
    {
        $total = CartItem::where('cart_id', $cartId)->count();
        return response()->json($total);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\User;
use App\Models\Item;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getTotalPrice($cartItems)
    {
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->item->price;
        }
        return $totalPrice;
    }

    public function show()
    {
        $user = auth()->user();
        if ($user->cart) {
            $cartItems = $user->cart->cartItems;
            $total = $this->getTotalPrice($cartItems);
            return view('cart', ['cartItems' => $cartItems, 'total' => $total]);
        } else {
            return view('cart', ['cartItems' => [], 'total' => 0]);
        }
    }

    public function addItem($itemId)
    {
            $user = auth()->user();
            $cart = $user->cart ?? $user->cart()->create();
            $cartItem = new CartItem([
                'cart_id' => $cart->id,
                'item_id' => $itemId,
            ]);
            $cartItem->save();
            return redirect()->route('cart.show')->withErrors(['success' => 'Товар успешно добавлен в корзину']);
    }

    public function removeItem($itemId)
    {
        $user = auth()->user();
        $cart = $user->cart;
        if ($cart) {
            $cartItem = $cart->cartItems()->where('item_id', $itemId)->first();
            if ($cartItem) {
                $cartItem->delete();
                return redirect()->route('cart.show')->withErrors(['success' => 'Товар успешно удален из корзины']);
            } else {
                return redirect()->route('cart.show')->withErrors(['error' => 'Этот товар не найден в вашей корзине']);
            }
        } else {
            return redirect()->route('cart.show')->withErrors(['error' => 'Ваша корзина пуста']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CartController extends Controller
{
    public function index()
    {
        App::setLocale(session()->get('lang', 'en'));
        return view('item.cart', [
            'cart' => session()->get('cart', []),
        ]);
    }

    private function getCartSize()
    {
        $size = 0;
        $cart = session()->get('cart', []);
        foreach ($cart as $item) {
            $size += $item['quantity'];
        }
        return $size;
    }

    private function getCartTotalPrice()
    {
        $totalPrice = 0;
        $cart = session()->get('cart', []);

        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;
    }

    public function addToCart(Request $request, Item $item)
    {
        $cart = session()->get('cart', []);
        $quantity = intval($request['quantity']);

        if (isset($cart[$item['id']])) {
            $cart[$item['id']]['quantity'] += $quantity;
        } else {
            $cart[$item['id']] = [
                "id" => $item['id'],
                "title" => $item['title'],
                "quantity" => $quantity,
                "img" => $item['img'],
                "price" => $item['price'],
                "notes" => $request['notes']
            ];
        }

        session()->put('cart', $cart);
        session()->put('size', CartController::getCartSize());
        session()->put('totalPrice', CartController::getCartTotalPrice());

        return redirect('/menu')->with('message', $quantity . ' of ' . $item['title'] . ' successfully added to your basket!');
    }

    public function updateCart(Request $request, Item $item)
    {
        $cart = session()->get('cart', []);
        $quantity = intval($request['quantity']);

        $cart[$item['id']]['quantity'] = $quantity;

        session()->put('cart', $cart);
        session()->put('size', CartController::getCartSize());
        session()->put('totalPrice', CartController::getCartTotalPrice());
        return back()->with('message', 'Quantity updated successfully');
    }

    public function deleteFromCart(Request $request, Item $item)
    {
        $cart = session()->get('cart', []);

        unset($cart[$item['id']]);

        session()->put('cart', $cart);
        session()->put('size', CartController::getCartSize());
        session()->put('totalPrice', CartController::getCartTotalPrice());
        return back()->with('message', 'Item removed successfully');
    }
}

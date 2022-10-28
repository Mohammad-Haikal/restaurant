<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        App::setLocale(session()->get('lang', 'en'));
        return view('order.index', [
            'orders' => Order::where(['user_id' => Auth::id(), 'confirmed' => 0])->get()->sortByDesc('created_at'),
            'confirmedOrders' => Order::where(['user_id' => Auth::id(), 'confirmed' => 1])->get()->sortByDesc('created_at'),
        ]);
    }

    public function store(Request $request)
    {
        // Validate Order data input
        $order = $request->validate([
            'name' => 'required',
            'phone' => 'required|min:9',
            'address' => 'required',
            'street' => 'required',
            'building' => 'required',
            'floor' => 'required',
            'notes' => 'nullable',
        ]);

        // Append to Order data
        $order['user_id'] = Auth::id();
        $order['quantity'] = session()->get('size', []);
        $order['total_price'] = session()->get('totalPrice', []);

        // Get Cart array from session
        $cart = session()->get('cart', []);

        // Store Order
        $storedOrder = Order::create($order);

        foreach ($cart as $item) {
            // Store OrderItems
            OrderItems::create([
                'order_id' => $storedOrder['id'],
                'item_id' => $item['id'],
                'quantity' => $item['quantity'],
                'notes' => $item['notes']
            ]);
        }

        // Clear 3 Sessions
        session()->forget(['cart', 'totalPrice', 'size']);

        return redirect('/orderHistory')->with('message', 'Your order has been successfully set!');
    }

    public function show(Order $order)
    {
        App::setLocale(session()->get('lang', 'en'));

        // Only Same user or Admin
        if ($order->user['id'] == Auth::id() || Auth::user()['role']) {
            return view('order.show', [
                'order' => $order,
                'orderItems' => $order->items
            ]);
        }
        else{
            return abort(401);
        }

    }

    public function confirm(Order $order){
        $order->update(['confirmed' => 1]);
        return redirect('/dashboard/orders')->with('message', 'Order Confirmed!');
    }

    public function deny(Order $order){
        $order->update(['confirmed' => 0]);
        return redirect('/dashboard/orders')->with('message', 'Order Denied!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/dashboard/orders')->with('message', 'Order deleted successfully!');
    }
}

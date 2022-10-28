<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function items()
    {
        return Item::all();
    }

    public function orders()
    {
        return view('api.order' , [
            'orders' => Order::where(['confirmed' => 0])->paginate(5),
        ]);
    }

    public function orderItems()
    {
        return OrderItems::all();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // New Users before 1 month
        $newUsers = User::whereBetween('created_at', [Carbon::now()->subMonth(1)->toDateString(), Carbon::now()->addDay(1)->toDateString()])->paginate(5);

        // Top 5 selling items (only confirmed orders)
        $topItems = DB::table('order_items')->selectRaw('order_items.item_id, SUM(order_items.quantity) as count')->join('orders', 'order_items.order_id', '=', 'orders.id')->groupBy('order_items.item_id')->where('orders.confirmed', '=' , 1)->orderByDesc('count')->limit(5)->get();
        $topItems = json_decode($topItems, true);

        // Top 5 Customer Orders
        $topCustomerOrders = DB::table('orders')->selectRaw('user_id, sum(quantity) as quantity, count(id) as count')->groupBy('user_id')->where('orders.confirmed', '=' , 1)->orderByDesc('count')->limit(5)->get();
        $topCustomerOrders = json_decode($topCustomerOrders, true);

        return view('admin.dashboard', [
            'users' => $newUsers,
            'topItems' => $topItems,
            'topCustomerOrders' => $topCustomerOrders
        ]);
    }

    public function orders()
    {
        return view('admin.orders', [
            'orders' => Order::where(['confirmed' => 0])->paginate(5),
            'confirmedOrders' => Order::where(['confirmed' => 1])->get()->sortByDesc('created_at'),
        ]);
    }

    public function items()
    {
        if (request('search') ?? false) {
            return view('admin.items', [
                'items' => Item::where('title', 'like', '%' . request('search') . '%')->orWhere('description', 'like', '%' . request('search') . '%')->paginate(8),
                'categories' => Category::all()
            ]);
        }

        if (request('category') ?? false) {
            return view('admin.items', [
                'items' => Item::where('category_id', '=', request('category'))->paginate(8),
                'categories' => Category::all()
            ]);
        }

        return view('admin.items', [
            'items' => Item::paginate(8),
            'categories' => Category::all()
        ]);
    }

    public function categories()
    {
        return view('admin.categories', [
            'categories' => Category::all()->sortByDesc('created_at')
        ]);
    }

    public function customers()
    {
        return view('admin.customers', [
            'users' => User::orderBy('created_at', 'desc')->paginate(8)


        ]);
    }
}

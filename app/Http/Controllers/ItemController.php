<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function search()
    {
        App::setLocale(session()->get('lang', 'en'));

        if (request('search') ?? false) {
            return view('item.search', [
                'items' => Item::where('title', 'like', '%' . request('search') . '%')->orWhere('description', 'like', '%' . request('search') . '%')->paginate(12),
            ]);
        }
        return view('item.search', [
            'items' => Item::paginate(12),
        ]);
    }

    public function checkout()
    {
        App::setLocale(session()->get('lang', 'en'));
        return view('item.checkout');
    }

    public function show(Item $item)
    {
        App::setLocale(session()->get('lang', 'en'));
        return view('item.show', [
            'item' => $item,
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => ['required'],
            'category_id' => ['required'],
            'title' => ['required'],
            'price' => ['required'],
            'description' => ['required']
        ]);

        if ($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('imgs/items', 'public');
        }

        Item::create($formFields);
        return redirect('/dashboard/items')->with('message', 'Item added successfully');
    }

    public function edit(Item $item)
    {
        App::setLocale(session()->get('lang', 'en'));
        return view('item.update', [
            'item' => $item,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Item $item)
    {
        $formFields = $request->validate([
            'title' => ['required'],
            'category_id' => ['required'],
            'title' => ['required'],
            'price' => ['required'],
            'description' => ['required']
        ]);

        if ($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('imgs/items', 'public');
            Storage::disk('public')->delete($item['img']);
        }

        $item->update($formFields);
        return redirect('/dashboard/items')->with('message', 'Item updated successfully');
    }

    public function destroy(Item $item)
    {
        Storage::disk('public')->delete($item['img']);
        $item->delete();
        return redirect('/dashboard/items')->with('message', 'Item deleted successfully');
    }
}

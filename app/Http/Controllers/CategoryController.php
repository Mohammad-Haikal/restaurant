<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        App::setLocale(session()->get('lang', 'en'));
        return view('categories.show', [
            'category' => $category,
            'items' => $category->items,
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required'],
        ]);

        if ($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('imgs/categories', 'public');
        }

        Category::create($formFields);
        return redirect('/dashboard/categories')->with('message', 'Category added successfully');
    }

    public function edit(Category $category)
    {
        App::setLocale(session()->get('lang', 'en'));
        return view('categories.update', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $formFields = $request->validate([
            'name' => ['required'],
        ]);

        if ($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('imgs/categories', 'public');
            Storage::disk('public')->delete($category['img']);
        }

        $category->update($formFields);
        return redirect('/dashboard/categories')->with('message', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        Storage::disk('public')->delete($category['img']);
        $category->delete();
        return redirect('/dashboard/categories')->with('message', 'Category deleted successfully');
    }
}

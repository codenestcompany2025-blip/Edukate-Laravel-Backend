<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);

        return view('dashboard.admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.admin.categories.create');
    }

    public function store(Request $request)
    {

        // dd($request->all());

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        return view('dashboard.admin.categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}

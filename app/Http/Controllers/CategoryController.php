<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();

        return view('category.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $categoryRequest)
    {
        $data = $categoryRequest->validated();

        Category::create($data);

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('category.edit', [
            'category' => $category,
        ]);
    }

    public function update(CategoryRequest $categoryRequest, Category $category)
    {
        $data = $categoryRequest->validated();

        $category->update($data);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}

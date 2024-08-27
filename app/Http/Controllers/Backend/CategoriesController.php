<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lang' => 'required',
            'ten' => 'required',
            'thuTu' => 'required|integer',
            'anHien' => 'required|boolean',
        ]);

        Category::create([
            'lang' => $request->lang,
            'ten' => $request->ten,
            'thuTu' => $request->thuTu,
            'anHien' => $request->anHien,
        ]);

        return redirect()->route('categories.index')->with('success', 'Loại tin đã được thêm thành công!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'lang' => 'required',
            'ten' => 'required',
            'thuTu' => 'required|integer',
            'anHien' => 'required|boolean',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Loại tin đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    
        return redirect()->route('categories.index');
    }
}

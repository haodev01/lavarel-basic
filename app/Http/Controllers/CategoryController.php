<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('admin.pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //
        $slug = Str::slug($request->get('name'));
        $existingCategory = Category::where('slug', $slug)->first();
        if ($existingCategory) {
            return redirect()->route('categories.create')->withErrors([
                'errorMessage' =>  'Danh mục này đã tồn tại'
            ])->withInput();
        }
        $dataToDo = [
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ];
        $category = Category::create($dataToDo);

        // Store the blog post...

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.pages.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        //
        $category = Category::find($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', "Sửa danh mục thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công');
    }
}

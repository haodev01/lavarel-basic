<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $query = Tag::query();
        $keyword = '';
        if ($request->get('keyword')) {
            $keyword = $request->get('keyword');
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        $key = "created_at";
        $value = "desc";
        if ($request->has('sort')) {
            // Thêm điều kiện sort vào truy vấn dựa trên yêu cầu của người dùng
            switch ($request->input('sort')) {
                case 'name_asc':
                    $key = "name";
                    $value = "asc";
                    break;
                case 'name_desc':
                    $key = "name";
                    $value = "desc";
                    break;
                case 'created_at_asc':
                    $key = "created_at";
                    $value = "asc";
                    break;
                case 'created_at_desc':
                    $key = "created_at";
                    $value = "desc";
                    break;
                default:
                    $key = "created_at";
                    $value = "desc";
            }
        }
        $query->orderBy($key, $value);
        $tags = $query->paginate(10);
        return view('admin.pages.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pages.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $slug = Str::slug($request->get('name'));
        $existingCategory = Tag::where('slug', $slug)->first();
        if ($existingCategory) {
            return redirect()->route('tags.create')->withErrors([
                'errorMessage' =>  'Từ khóa này đã tồn tại'
            ])->withInput();
        }
        $dataToDo = [
            'name' => $request->get('name'),
        ];
        $category = Tag::create($dataToDo);

        // Store the blog post...

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag =  Tag::find($id);
        return view('admin.pages.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tag = Tag::find($id);
        $tag->update($request->all());

        return redirect()->route('tags.index')->with('success', "Sửa từ khóa thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Xóa từ khóa thành công');
    }
}

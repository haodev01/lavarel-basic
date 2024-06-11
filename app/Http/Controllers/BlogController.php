<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::paginate(10);
        return view('admin.pages.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.pages.blogs.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateArticleRequest $request)
    {
        $file = $request->file('thumb');
        $path = 'images/' . date('Ymd');
        $thumb = '';
        try {
            $thumb = Storage::disk('public')->putFile($path, $file);
        } catch (\Exception $exception) {
            return redirect()->route('blogs.index')->withErrors('errorMessage', $exception->getMessage());
        }
        $dataTodo = [
            'title' => $request->get('title'),
            'description' => $request->get('title'),
            'author_id' => Auth::user()->id,
            'thumb' => $thumb
        ];
        $blog = Blog::create($dataTodo);
        $this->createTagForArticle($request, $blog);
        $this->createCategoryForArticle($request, $blog);
        return redirect()->route('blogs.index')->with('success', 'Thêm bài viết thành công');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Xóa bài viết thành công');
    }
    private function createTagForArticle(Request $request, Blog $blog)
    {
        $tags = $request->get('tags');
        if (!empty($tags)) {
            $arrTags = [];
            foreach ($tags as $tag) {
                $tagFix = (int) $tag;
                if ($tagFix) {
                    $tagObj = Tag::find($tagFix);
                } else {
                    $tagObj = null;
                }
                if (!empty($tagObj)) {
                    $arrTags[] = $tagObj->id;
                }
            }
            if (!empty($arrTags)) {
                $blog->tags()->attach($arrTags);
            }
        }
    }
    private function createCategoryForArticle(Request $request, Blog $blog)
    {
        $categories = $request->get('categories');

        if (!empty($categories)) {
            $arrCate = [];
            foreach ($categories as $tag) {
                $cateFix = (int) $tag;
                if ($cateFix) {
                    $cateObj = Category::find($cateFix);
                } else {
                    $cateObj = null;
                }
                if (!empty($cateObj)) {
                    $arrCate[] = $cateObj->id;
                }
            }
            if (!empty($arrCate)) {
                $blog->categories()->attach($arrCate);
            }
        }
    }
}

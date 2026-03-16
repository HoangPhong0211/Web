<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::with('category')->latest()->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
            'featured_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $post = new Post($request->all());
        $post->slug = Str::slug($request->title);
        $post->author_id = Auth::id(); // Tự động lấy ID người đang login

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('featured_image')) {
            $post->featured_image = $request->file('featured_image')->store('posts', 'public');
        }

        $post->save();
        return redirect()->route('admin.posts.index')->with('success', 'Đã thêm bài viết mới!');
    }
}
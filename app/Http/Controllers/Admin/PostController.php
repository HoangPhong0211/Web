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
        $categories = Category::all();
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
        $post->slug = Str::slug($request->input('title'));
        $post->author_id = Auth::id(); // Tự động lấy ID người đang login

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('featured_image')) {
            $post->featured_image = $request->file('featured_image')->store('posts', 'public');
        }

        $post->save();
        return redirect()->route('admin.posts.index')->with('success', 'Đã thêm bài viết mới!');
    }

    public function edit($id)
    {
        // Tìm bài viết theo ID, nếu không thấy sẽ hiện lỗi 404
        $post = Post::findOrFail($id);

        // Lấy danh sách danh mục để hiện ở ô Select
        $categories = Category::all();

        // Trả về view sửa bài viết và truyền dữ liệu sang
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // 1. Tìm bài viết cần sửa
        $post = Post::findOrFail($id);

        // 2. Kiểm tra dữ liệu đầu vào (Validation) để tránh lỗi bảo mật
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // 3. Chuẩn bị dữ liệu để cập nhật
        $post->title = $request->input('title');
        $post->slug = Str::slug($request->input('title')); // Tự động tạo link sạch (SEO)
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        $post->status = $request->input('status', $post->status);

        // 4. Xử lý upload ảnh (nếu người dùng chọn ảnh mới)
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Lưu trực tiếp vào thư mục public/images để hiển thị ngay
            $file->move(public_path('images'), $filename);

            $post->featured_image = $filename;
        }

        // 5. Lưu vào Database
        $post->save();

        // 6. Quay lại trang danh sách với thông báo thành công
        return redirect()->route('admin.posts.index')->with('success', 'Cập nhật bài viết thành công!');
    }

    public function show($id)
    {
        return redirect()->route('admin.posts.edit', $id);
    }

    public function destroy($id)
    {
        // 1. Tìm bài viết cần xóa
        $post = \App\Models\Post::findOrFail($id);

        // 2. Xóa ảnh đính kèm trong thư mục public/images (nếu có)
        if ($post->image && file_exists(public_path('images/' . $post->image))) {
            unlink(public_path('images/' . $post->image));
        }

        // 3. Thực hiện xóa trong Database
        $post->delete();

        // 4. Quay về trang danh sách với thông báo thành công
        return redirect()->route('admin.posts.index')->with('success', 'Đã xóa bài viết thành công!');
    }
}
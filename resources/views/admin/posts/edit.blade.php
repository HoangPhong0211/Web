@extends('layouts.admin')

@section('content')
<div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); max-width: 1000px; margin: 0 auto;">
    <div style="border-bottom: 2px solid #f1f5f9; padding-bottom: 15px; margin-bottom: 25px; display: flex; align-items: center; justify-content: space-between;">
        <h2 style="margin: 0; font-family: 'Segoe UI', sans-serif; color: #1e293b;">
            <i class="fa-solid fa-pen-to-square" style="margin-right: 10px; color: #4f46e5;"></i> Chỉnh sửa bài viết
        </h2>
        <a href="{{ route('admin.posts.index') }}" style="color: #64748b; text-decoration: none; font-size: 14px;"> Quay lại</a>
    </div>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div style="display: grid; grid-template-cols: 2fr 1fr; gap: 30px;">
            <div>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Tiêu đề</label>
                    <input type="text" name="title" value="{{ $post->title }}" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Nội dung chi tiết</label>
                    <textarea id="editor" name="content" style="width: 100%; min-height: 300px;">{{ $post->content }}</textarea>
                </div>
            </div>

            <div style="background: #f8fafc; padding: 20px; border-radius: 10px; border: 1px solid #e2e8f0;">
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">Danh mục</label>
                    <select name="category_id" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; background: white;">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Ảnh đại diện hiện tại</label>
                    <div style="margin-bottom: 10px; border-radius: 8px; overflow: hidden; border: 1px solid #ddd;">
                        <img src="{{ asset('images/' . $post->featured_image) }}" style="width: 100%; display: block;">
                    </div>
                    <input type="file" name="featured_image" style="width: 100%; font-size: 13px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Trạng thái</label>
                    <select name="status" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px;">
                        <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Đã đăng</option>
                        <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Bản nháp</option>
                    </select>
                </div>

                <button type="submit" style="width: 100%; background: #4f46e5; color: white; padding: 14px; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; transition: 0.3s;">
                    CẬP NHẬT BÀI VIẾT
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
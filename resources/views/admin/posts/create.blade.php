@extends('layouts.admin')

@section('content')
    <div
        style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); max-width: 1000px; margin: 0 auto;">
        <div
            style="border-bottom: 2px solid #f1f5f9; padding-bottom: 15px; margin-bottom: 25px; display: flex; align-items: center; justify-content: space-between;">
            <h2 style="margin: 0; font-family: 'Segoe UI', sans-serif; color: #1e293b;">
                <i class="fa-solid fa-file-circle-plus" style="margin-right: 10px; color: #4f46e5;"></i> Tạo bài viết mới
            </h2>
            <a href="{{ route('admin.posts.index') }}" style="color: #64748b; text-decoration: none; font-size: 14px;">
                <i class="fa-solid fa-arrow-left"></i> Quay lại danh sách
            </a>
        </div>

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data"
            style="font-family: 'Segoe UI', sans-serif;">
            @csrf
            <div style="display: grid; grid-template-cols: 2fr 1fr; gap: 30px;">
                <div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">Tiêu đề bài
                            viết</label>
                        <input type="text" name="title" required placeholder="Nhập tiêu đề hấp dẫn..."
                            style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px; outline: none; transition: 0.3s;"
                            onfocus="this.style.borderColor='#4f46e5'; this.style.boxShadow='0 0 0 3px rgba(79, 70, 229, 0.1)'"
                            onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none'">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">Mô tả ngắn
                            (Excerpt)</label>
                        <textarea name="excerpt" rows="3" placeholder="Tóm tắt ngắn gọn nội dung..."
                            style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px; outline: none; resize: vertical;"></textarea>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">Nội dung chi
                            tiết</label>
                        <textarea id="editor" name="content"
                            style="width: 100%; min-height: 300px; border: 1px solid #cbd5e1; border-radius: 8px;"></textarea>
                    </div>
                </div>

                <div>
                    <div
                        style="background: #f8fafc; padding: 20px; border-radius: 10px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">Danh
                                mục</label>
                            <select name="category_id"
                                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; background: white;">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">Ảnh đại
                                diện</label>
                            <input type="file" name="featured_image" style="width: 100%; font-size: 13px; color: #64748b;">
                            @error('featured_image')
                                <p style="color: #ef4444; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
                            @enderror
                            <p style="font-size: 11px; color: #94a3b8; margin-top: 5px;">Hỗ trợ: JPG, PNG (Max 2MB)</p>
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">Trạng
                                thái</label>
                            <select name="status"
                                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; background: white;">
                                <option value="published">Xuất bản ngay</option>
                                <option value="draft">Lưu bản nháp</option>
                            </select>
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <button type="submit"
                            style="background: #4f46e5; color: white; padding: 14px; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; transition: 0.3s; font-size: 15px;">
                            <i class="fa-solid fa-check"></i> LƯU BÀI VIẾT
                        </button>
                        <a href="{{ route('admin.posts.index') }}"
                            style="text-align: center; color: #ef4444; padding: 10px; text-decoration: none; font-weight: 600; font-size: 14px; border: 1px solid #fecaca; border-radius: 8px;">
                            Hủy bỏ
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        if (typeof ClassicEditor !== 'undefined') {
            ClassicEditor.create(document.querySelector('#editor')).catch(error => { console.error(error); });
        }
    </script>
@endsection
@extends('layouts.admin')

@section('content')
<div style="max-width: 1100px; margin: 0 auto;">
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.projects.index') }}" style="text-decoration: none; color: #64748b;">
            <i class="fa-solid fa-arrow-left"></i> Quay lại danh sách
        </a>
    </div>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
            
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                <h3 style="margin-top: 0; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Chỉnh sửa hồ sơ dự án</h3>
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Tên dự án</label>
                    <input type="text" name="title" value="{{ $project->title }}" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Mô tả ngắn</label>
                    <textarea name="summary" rows="3" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px;">{{ $project->summary }}</textarea>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Nội dung chi tiết</label>
                    <textarea id="editor" name="description" style="width: 100%; min-height: 400px;">{{ $project->description }}</textarea>
                </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 20px;">
                <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Phân loại</label>
                        <select name="category" required style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px;">
                            <option value="bridge" {{ $project->category == 'bridge' ? 'selected' : '' }}>Cầu / Đường cao tốc</option>
                            <option value="factory" {{ $project->category == 'factory' ? 'selected' : '' }}>Nhà máy công nghiệp</option>
                            <option value="urban" {{ $project->category == 'urban' ? 'selected' : '' }}>Khu đô thị - dân cư</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Địa điểm</label>
                        <input type="text" name="location" value="{{ $project->location }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Năm thực hiện</label>
                        <input type="number" name="year" value="{{ $project->year }}" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Ảnh hiện tại</label>
                        <img src="{{ asset('images/' . $project->image) }}" style="width: 100%; border-radius: 8px; margin-bottom: 10px; border: 1px solid #eee;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Thay đổi ảnh</label>
                        <input type="file" name="image" style="width: 100%; font-size: 13px;">
                    </div>

                    <button type="submit" style="width: 100%; background: #4f46e5; color: white; padding: 14px; border: none; border-radius: 8px; font-weight: 700; cursor: pointer;">
                        CẬP NHẬT DỰ ÁN
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
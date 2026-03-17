@extends('layouts.admin')

@section('content')
    <div style="max-width: 1100px; margin: 0 auto;">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @if ($errors->any())
                <div style="background: #fee2e2; color: #b91c1c; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                    <ul style="margin: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">

                <div
                    style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                    <h3
                        style="margin-top: 0; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 10px; color: #1e293b;">
                        Nội dung dự án</h3>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Tên dự án</label>
                        <input type="text" name="title" required placeholder="Ví dụ: Cầu sông Hương"
                            style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Mô tả ngắn (Hiển thị ở danh
                            sách)</label>
                        <textarea name="summary" rows="3"
                            style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px;"></textarea>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Chi tiết hồ sơ công
                            trình</label>
                        <textarea id="editor" name="description" style="width: 100%; min-height: 400px;"></textarea>
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div
                        style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: 600; margin-bottom: 8px;">Phân loại</label>
                            <select name="category" required
                                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px;">
                                <option value="bridge">Cầu / Đường cao tốc</option>
                                <option value="factory">Nhà máy công nghiệp</option>
                                <option value="urban">Khu đô thị - dân cư</option>
                            </select>
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: 600; margin-bottom: 8px;">Địa điểm</label>
                            <input type="text" name="location" placeholder="Ví dụ: Ninh Thuận"
                                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: 600; margin-bottom: 8px;">Năm thực hiện</label>
                            <input type="number" name="year" value="2024"
                                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; font-weight: 600; margin-bottom: 8px;">Ảnh dự án</label>
                            <input type="file" name="image" style="width: 100%; font-size: 13px;">
                        </div>

                        <button type="submit"
                            style="width: 100%; background: #4f46e5; color: white; padding: 14px; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; font-size: 15px;">
                            LƯU DỰ ÁN
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
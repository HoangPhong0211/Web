@extends('layouts.admin')

@section('content')
    <div
        style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); max-width: 1000px; margin: 0 auto;">
        <div
            style="border-bottom: 2px solid #f1f5f9; padding-bottom: 15px; margin-bottom: 25px; display: flex; align-items: center; justify-content: space-between;">
            <h2 style="margin: 0; font-family: 'Segoe UI', sans-serif; color: #1e293b;">
                <i class="fa-solid fa-pen-to-square" style="margin-right: 10px; color: #4f46e5;"></i> Chỉnh sửa dịch vụ
            </h2>
            <a href="{{ route('admin.services.index') }}" style="color: #64748b; text-decoration: none; font-size: 14px;">
                <i class="fa-solid fa-arrow-left"></i> Quay lại
            </a>
        </div>

        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
                <div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Tên dịch vụ</label>
                        <input type="text" name="title" value="{{ $service->title }}" required
                            style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Mô tả ngắn</label>
                        <textarea name="summary" rows="3"
                            style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px;">{{ $service->summary }}</textarea>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Nội dung chi tiết</label>
                        <textarea id="editor" name="description"
                            style="width: 100%; min-height: 250px;">{{ $service->description }}</textarea>
                    </div>
                </div>

                <div style="background: #f8fafc; padding: 20px; border-radius: 10px; border: 1px solid #e2e8f0;">
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Icon hiện tại: <i
                                class="fa-solid {{ $service->icon }}"></i></label>
                        <input type="text" name="icon" value="{{ $service->icon }}" placeholder="fa-helmet-safety"
                            style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px;">
                    </div>

                    <div
                        style="background: #f8fafc; padding: 20px; border-radius: 10px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Hình ảnh dịch vụ</label>

                        @if($service->image)
                            <div style="margin-bottom: 10px;">
                                <img src="{{ asset('images/' . $service->image) }}"
                                    style="width: 100%; border-radius: 8px; border: 1px solid #cbd5e1;">
                                <p style="font-size: 11px; color: #64748b; margin-top: 5px;">Ảnh hiện tại</p>
                            </div>
                        @endif

                        <input type="file" name="image" accept="image/*" style="width: 100%; font-size: 13px;">
                    </div>

                    <div style="margin-bottom: 25px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Trạng thái</label>
                        <select name="status"
                            style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px;">
                            <option value="published" {{ $service->status == 'published' ? 'selected' : '' }}>Xuất bản
                            </option>
                            <option value="draft" {{ $service->status == 'draft' ? 'selected' : '' }}>Bản nháp</option>
                        </select>
                    </div>

                    <button type="submit"
                        style="width: 100%; background: #4f46e5; color: white; padding: 14px; border: none; border-radius: 8px; font-weight: 700; cursor: pointer;">
                        CẬP NHẬT DỊCH VỤ
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
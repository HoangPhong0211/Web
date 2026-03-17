@extends('layouts.admin')

@section('content')
    <div
        style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); max-width: 1000px; margin: 0 auto;">
        <div
            style="border-bottom: 2px solid #f1f5f9; padding-bottom: 15px; margin-bottom: 25px; display: flex; align-items: center; justify-content: space-between;">
            <h2 style="margin: 0; font-family: 'Segoe UI', sans-serif; color: #1e293b;">
                <i class="fa-solid fa-plus-circle" style="margin-right: 10px; color: #4f46e5;"></i> Thêm dịch vụ mới
            </h2>
            <a href="{{ route('admin.services.index') }}" style="color: #64748b; text-decoration: none; font-size: 14px;">
                <i class="fa-solid fa-arrow-left"></i> Quay lại
            </a>
        </div>

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
                <div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">Tên dịch
                            vụ</label>
                        <input type="text" name="title" required placeholder="Ví dụ: Khoan khảo sát địa chất"
                            style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">Mô tả
                            ngắn</label>
                        <textarea name="summary" rows="3" placeholder="Tóm tắt ngắn gọn dịch vụ..."
                            style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px;"></textarea>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">Nội dung chi
                            tiết (Quy trình, thiết bị...)</label>
                        <textarea id="editor" name="description"
                            style="width: 100%; min-height: 250px; border: 1px solid #cbd5e1; border-radius: 8px;"></textarea>
                    </div>
                </div>

                <div
                    style="background: #f8fafc; padding: 20px; border-radius: 10px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">Hình ảnh đại
                        diện</label>
                    <input type="file" name="image" accept="image/*" style="width: 100%; font-size: 13px;">
                    <p style="margin-top: 8px; font-size: 11px; color: #94a3b8;">Định dạng: JPG, PNG, WebP. Tối đa 2MB.</p>
                </div>

                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div style="background: #f8fafc; padding: 20px; border-radius: 10px; border: 1px solid #e2e8f0;">
                        <div style="margin-bottom: 0;">
                            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #475569;">Trạng
                                thái</label>
                            <select name="status"
                                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; background: white;">
                                <option value="published">Xuất bản ngay</option>
                                <option value="draft">Bản nháp</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit"
                        style="width: 100%; background: #4f46e5; color: white; padding: 14px; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; transition: 0.3s; font-size: 15px;">
                        <i class="fa-solid fa-floppy-disk"></i> LƯU DỊCH VỤ
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
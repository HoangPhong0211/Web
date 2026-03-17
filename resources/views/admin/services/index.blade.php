@extends('layouts.admin')

@section('content')
    <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
        <div
            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
            <h2 style="margin: 0; font-family: 'Segoe UI', sans-serif; color: #2d3748; display: flex; align-items: center;">
                <i class="fa-solid fa-gears" style="margin-right: 12px; color: #4f46e5;"></i> Quản lý dịch vụ
            </h2>
            <a href="{{ route('admin.services.create') }}"
                style="background: #4f46e5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px; transition: 0.3s;">
                <i class="fa-solid fa-plus"></i> Thêm dịch vụ mới
            </a>
        </div>

        <table style="width: 100%; border-collapse: collapse; font-family: 'Segoe UI', sans-serif;">
            <thead>
                <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                    <th
                        style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase;">
                        Hình ảnh</th>
                    <th
                        style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase;">
                        Tên dịch vụ</th>
                    <th
                        style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase;">
                        Mô tả ngắn</th>
                    <th
                        style="padding: 15px; text-align: center; color: #64748b; font-size: 13px; text-transform: uppercase;">
                        Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: 0.2s;"
                        onmouseover="this.style.backgroundColor='#f8fafc'"
                        onmouseout="this.style.backgroundColor='transparent'">
                        <td style="padding: 15px; width: 100px;">
                            @if($service->image)
                                <img src="{{ asset('images/' . $service->image) }}"
                                    style="width: 80px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid #e2e8f0;">
                            @else
                                <div
                                    style="width: 80px; height: 50px; background: #f1f5f9; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #cbd5e1; font-size: 10px;">
                                    No Image
                                </div>
                            @endif
                        </td>
                        <td style="padding: 15px;">
                            <div style="font-weight: 600; color: #1e293b; font-size: 15px;">{{ $service->title }}</div>
                            <div style="font-size: 11px; color: #94a3b8; margin-top: 2px;">SLUG: {{ $service->slug }}</div>
                        </td>

                        <td style="padding: 15px; color: #64748b; font-size: 14px; max-width: 400px;">
                            {{ Str::limit($service->summary, 100) }}
                        </td>

                        <td style="padding: 15px; text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 15px;">
                                <a href="{{ route('admin.services.edit', $service->id) }}"
                                    style="color: #3b82f6; font-size: 18px;" title="Sửa">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa dịch vụ này?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        style="background:none; border:none; color: #ef4444; cursor: pointer; font-size: 18px; padding: 0;">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="padding: 40px; text-align: center; color: #94a3b8;">
                            Chưa có dữ liệu dịch vụ. Hãy thêm mới ngay!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
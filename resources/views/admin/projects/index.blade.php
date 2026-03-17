@extends('layouts.admin')

@section('content')
    <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
        <div
            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
            <h2 style="margin: 0; font-family: 'Segoe UI', sans-serif; color: #2d3748; display: flex; align-items: center;">
                <i class="fa-solid fa-helmet-safety" style="margin-right: 12px; color: #4f46e5;"></i> Quản lý dự án tiêu
                biểu
            </h2>
            <a href="{{ route('admin.projects.create') }}"
                style="background: #4f46e5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px;">
                <i class="fa-solid fa-plus"></i> Thêm dự án mới
            </a>
        </div>

        <table style="width: 100%; border-collapse: collapse; font-family: 'Segoe UI', sans-serif;">
            <thead>
                <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                    <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px;">HÌNH ẢNH</th>
                    <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px;">TÊN DỰ ÁN</th>
                    <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px;">PHÂN LOẠI</th>
                    <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px;">ĐỊA ĐIỂM / NĂM</th>
                    <th style="padding: 15px; text-align: center; color: #64748b; font-size: 13px;">THAO TÁC</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 15px;">
                            <img src="{{ asset('images/' . $project->image) }}"
                                style="width: 80px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid #eee;">
                        </td>
                        <td style="padding: 15px;">
                            <div style="font-weight: 600; color: #1e293b;">{{ $project->title }}</div>
                            <div style="font-size: 11px; color: #94a3b8;">SLUG: {{ $project->slug }}</div>
                        </td>
                        <td style="padding: 15px;">
                            @php
                                $types = [
                                    'bridge' => ['Cầu / Đường', '#dbeafe', '#1e40af'],
                                    'factory' => ['Nhà máy', '#dcfce7', '#166534'],
                                    'urban' => ['Đô thị', '#ffedd5', '#9a3412']
                                ];
                                $catKey = strtolower($project->category);
                                $type = $types[$catKey] ?? ['Không xác định', '#f1f5f9', '#64748b'];
                            @endphp
                            <span
                                style="background: {{ $type[1] }}; color: {{ $type[2] }}; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600;">
                                {{ $type[0] }}
                            </span>
                        </td>
                        <td style="padding: 15px; color: #64748b; font-size: 14px;">
                            {{ $project->location }} <br> <span style="font-size: 12px; color: #94a3b8;">Năm:
                                {{ $project->year }}</span>
                        </td>
                        <td style="padding: 15px; text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 12px;">
                                <a href="{{ route('admin.projects.edit', $project->id) }}" style="color: #3b82f6;"><i
                                        class="fa-solid fa-pen"></i></a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                    onsubmit="return confirm('Xóa dự án này?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        style="background:none; border:none; color: #ef4444; cursor: pointer;"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 40px; text-align: center; color: #94a3b8;">Chưa có dự án nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
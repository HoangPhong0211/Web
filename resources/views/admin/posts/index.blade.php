@extends('layouts.admin')

@section('content')
<div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
    {{-- Thông báo thành công sau khi xóa/thêm --}}
    @if(session('success'))
        <div style="background: #dcfce7; color: #15803d; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-weight: 500;">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
        <h2 style="margin: 0; font-family: 'Segoe UI', sans-serif; color: #2d3748; display: flex; align-items: center;">
            <i class="fa-solid fa-newspaper" style="margin-right: 12px; color: #4f46e5;"></i> Quản lý bài viết
        </h2>
        <a href="{{ route('admin.posts.create') }}" style="background: #4f46e5; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px; transition: 0.3s;">
            <i class="fa-solid fa-plus"></i> Thêm bài viết mới
        </a>
    </div>

    <table style="width: 100%; border-collapse: collapse; font-family: 'Segoe UI', sans-serif;">
        <thead>
            <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase;">Ảnh</th>
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase;">Nội dung bài viết</th>
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase;">Danh mục</th>
                <th style="padding: 15px; text-align: left; color: #64748b; font-size: 13px; text-transform: uppercase;">Trạng thái</th>
                <th style="padding: 15px; text-align: center; color: #64748b; font-size: 13px; text-transform: uppercase;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr style="border-bottom: 1px solid #f1f5f9;">
                <td style="padding: 15px;">
                    <div style="width: 70px; height: 50px; overflow: hidden; border-radius: 8px; border: 1px solid #e2e8f0; background: #f1f5f9;">
                        @php
                            // Tối ưu đường dẫn ảnh: Chỉ thêm /images/ nếu trong DB không có sẵn
                            $imgName = $post->featured_image;
                            $src = (str_starts_with($imgName, 'http') || str_contains($imgName, 'images/')) 
                                    ? asset($imgName) 
                                    : asset('images/' . $imgName);
                        @endphp
                        <img src="{{ $src }}" 
                             style="width: 100%; height: 100%; object-fit: cover;" 
                             onerror="this.src='{{ asset('images/main-logo.png') }}'">
                    </div>
                </td>
                <td style="padding: 15px;">
                    <div style="font-weight: 600; color: #1e293b; font-size: 14px;">{{ $post->title }}</div>
                    <div style="font-size: 11px; color: #94a3b8; margin-top: 2px;">
                        <i class="fa-regular fa-calendar"></i> {{ $post->created_at->format('d/m/Y') }}
                    </div>
                </td>
                <td style="padding: 15px;">
                    <span style="color: #475569; background: #f1f5f9; padding: 3px 10px; border-radius: 6px; font-size: 12px;">
                        {{ $post->category->name ?? 'Chưa phân loại' }}
                    </span>
                </td>
                <td style="padding: 15px;">
                    @if($post->status == 'published')
                        <span style="color: #15803d; font-size: 12px; font-weight: 600;">● Đã đăng</span>
                    @else
                        <span style="color: #a16207; font-size: 12px; font-weight: 600;">● Bản nháp</span>
                    @endif
                </td>
                <td style="padding: 15px; text-align: center;">
                    <div style="display: flex; justify-content: center; gap: 12px;">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" style="color: #3b82f6;" title="Sửa">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color: #ef4444; cursor: pointer; padding: 0;" title="Xóa">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="padding: 40px; text-align: center; color: #94a3b8;">Chưa có bài viết nào được tạo.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Phân trang --}}
    <div style="margin-top: 20px;">
        {{ $posts->links() }}
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Quản lý bài viết</h2>
        <a href="{{ route('admin.posts.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            <i class="fa-solid fa-plus mr-2"></i> Thêm bài viết mới
        </a>
    </div>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50 border-b">
                <th class="p-4 font-semibold text-gray-700">Ảnh</th>
                <th class="p-4 font-semibold text-gray-700">Tiêu đề</th>
                <th class="p-4 font-semibold text-gray-700">Danh mục</th>
                <th class="p-4 font-semibold text-gray-700">Trạng thái</th>
                <th class="p-4 font-semibold text-gray-700">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-4">
                    <img src="{{ $post->featured_image ? asset('storage/'.$post->featured_image) : 'https://via.placeholder.com/50' }}" class="w-12 h-12 object-cover rounded">
                </td>
                <td class="p-4 font-medium">{{ $post->title }}</td>
                <td class="p-4 text-sm text-gray-600">{{ $post->category->name }}</td>
                <td class="p-4">
                    <span class="px-2 py-1 rounded-full text-xs {{ $post->status == 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ $post->status == 'published' ? 'Đã đăng' : 'Bản nháp' }}
                    </span>
                </td>
                <td class="p-4 flex space-x-2">
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Xóa bài này?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500">Chưa có bài viết nào.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection
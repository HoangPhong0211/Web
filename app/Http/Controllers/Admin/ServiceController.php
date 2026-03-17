<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|max:255']);

        // 1. Lưu thông tin cơ bản và gán vào biến $service
        $service = Service::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'description' => $request->description,
            'status' => $request->status ?? 'published',
        ]);

        // 2. Xử lý ảnh và CẬP NHẬT vào database
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);

            // PHẢI CÓ DÒNG NÀY ĐỂ LƯU VÀO DB
            $service->update(['image' => $filename]);
        }

        return redirect()->route('admin.services.index')->with('success', 'Thêm dịch vụ thành công!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $request->validate(['title' => 'required|max:255']);

        $service->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ để tránh rác server
            if ($service->image && file_exists(public_path('images/' . $service->image))) {
                unlink(public_path('images/' . $service->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);

            // CẬP NHẬT TÊN ẢNH MỚI VÀO DB
            $service->update(['image' => $filename]);
        }

        return redirect()->route('admin.services.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->route('admin.services.index')->with('success', 'Đã xóa dịch vụ.');
    }
}
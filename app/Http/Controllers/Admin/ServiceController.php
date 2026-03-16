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

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:services',
            'description' => 'required',
            'icon' => 'nullable'
        ]);

        $data['slug'] = Str::slug($request->title);
        Service::create($data);

        return redirect()->back()->with('success', 'Thêm dịch vụ thành công!');
    }
}
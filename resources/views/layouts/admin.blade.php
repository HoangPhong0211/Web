<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - Địa Chất NMT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f7f6; display: flex; }
        .sidebar { width: 260px; background: #2c3e50; min-height: 100vh; color: white; position: fixed; }
        .sidebar-header { padding: 20px; text-align: center; font-size: 20px; font-weight: bold; border-bottom: 1px solid #34495e; }
        .nav-item { padding: 15px 25px; display: block; color: #bdc3c7; text-decoration: none; transition: 0.3s; }
        .nav-item:hover { background: #34495e; color: white; }
        .nav-item.active { background: #3498db; color: white; }
        .main-content { margin-left: 260px; flex: 1; }
        .header { background: white; padding: 15px 30px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center; }
        .container { padding: 30px; }
        .card-grid { display: grid; grid-template-cols: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); text-decoration: none; color: #333; border-top: 4px solid #3498db; transition: 0.3s; }
        .card:hover { transform: translateY(-5px); }
        .logout-btn { background: none; border: none; color: #e74c3c; cursor: pointer; font-size: 16px; padding: 15px 25px; width: 100%; text-align: left; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">NMT ADMIN</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fa fa-home" style="width: 25px;"></i> Dashboard
        </a>
        <a href="{{ route('admin.posts.index') }}" class="nav-item">
            <i class="fa fa-newspaper" style="width: 25px;"></i> Bài viết
        </a>
        <a href="{{ route('admin.services.index') }}" class="nav-item">
            <i class="fa fa-cogs" style="width: 25px;"></i> Dịch vụ
        </a>
        <a href="{{ route('admin.projects.index') }}" class="nav-item">
            <i class="fa fa-briefcase" style="width: 25px;"></i> Dự án
        </a>
        <form method="POST" action="{{ route('logout') }}" style="margin-top: 50px;">
            @csrf
            <button type="submit" class="logout-btn"><i class="fa fa-sign-out-alt" style="width: 25px;"></i> Đăng xuất</button>
        </form>
    </div>

    <div class="main-content">
        <div class="header">
            <h2 style="margin:0;">Hệ thống quản trị</h2>
            <div>Xin chào, <strong>{{ Auth::user()->name }}</strong></div>
        </div>
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>
</html>
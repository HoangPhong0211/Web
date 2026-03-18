<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Hoàng Gia Việt Nam' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=be-vietnam-pro:300,400,500,600,700&family=fraunces:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-sand text-ink">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:bg-white focus:px-4 focus:py-2 focus:rounded-full">
        Bỏ qua nội dung điều hướng
    </a>
    <div class="min-h-screen flex flex-col">
        <div class="bg-[color:var(--color-ink)] text-white text-xs md:text-sm">
            <div class="mx-auto w-full max-w-6xl px-5 py-2 flex flex-wrap gap-3 items-center justify-between">
                <div class="flex flex-wrap gap-4 items-center">
                    <span class="flex items-center gap-2">
                        <span class="inline-block h-2 w-2 rounded-full bg-brand"></span>
                        Hotline: 0982 461 026
                    </span>
                    <span class="hidden md:inline">Email: Hientvxd7217@gmail.com</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-white/70">Địa kỹ thuật - Khảo sát - Thí nghiệm</span>
                </div>
            </div>
        </div>

        <header class="sticky top-0 z-40 bg-sand/90 backdrop-blur border-b border-black/10">
            <div class="mx-auto w-full max-w-6xl px-5 py-4 flex items-center justify-between gap-6">
                <a href="/" class="flex items-center gap-3">
                    <span class="grid place-items-center h-11 w-11 rounded-full bg-brand text-white font-display text-lg">N</span>
                    <span class="flex flex-col leading-tight">
                        <span class="font-display text-lg">Địa Chất Hoàng Gia</span>
                        <span class="text-xs uppercase tracking-[0.2em] text-black/60">LAS-XD 1109</span>
                    </span>
                </a>

                <nav class="hidden lg:flex items-center gap-6 text-sm font-medium">
                    <a href="/" class="hover:text-brand">Trang chủ</a>
                    <a href="/gioi-thieu" class="hover:text-brand">Về chúng tôi</a>
                    <a href="/dich-vu" class="hover:text-brand">Dịch vụ</a>
                    <a href="/du-an" class="hover:text-brand">Dự án tiêu biểu</a>
                    <a href="/chung-chi" class="hover:text-brand">Chứng chỉ</a>
                    <a href="/tin-tuc" class="hover:text-brand">Tin tức</a>
                    <a href="/lien-he" class="hover:text-brand">Liên hệ</a>
                </nav>

                <div class="flex items-center gap-3">
                    <a href="/lien-he" class="hidden sm:inline-flex items-center gap-2 rounded-full bg-brand px-5 py-2 text-white text-sm font-semibold shadow-soft">
                        Liên hệ ngay
                    </a>
                    <button class="lg:hidden inline-flex items-center justify-center h-10 w-10 rounded-full border border-black/15" aria-label="Mở menu" aria-expanded="false" aria-controls="mobile-nav" data-menu-toggle>
                        <span class="h-0.5 w-5 bg-black"></span>
                    </button>
                </div>
            </div>

            <div id="mobile-nav" class="lg:hidden hidden border-t border-black/10 bg-sand" data-menu-target>
                <div class="mx-auto w-full max-w-6xl px-5 py-4 flex flex-col gap-3 text-sm font-medium">
                    <a href="/" class="hover:text-brand">Trang chủ</a>
                    <a href="/gioi-thieu" class="hover:text-brand">Về chúng tôi</a>
                    <a href="/dich-vu" class="hover:text-brand">Dịch vụ</a>
                    <a href="/du-an" class="hover:text-brand">Dự án tiêu biểu</a>
                    <a href="/chung-chi" class="hover:text-brand">Chứng chỉ</a>
                    <a href="/tin-tuc" class="hover:text-brand">Tin tức</a>
                    <a href="/lien-he" class="hover:text-brand">Liên hệ</a>
                </div>
            </div>
        </header>

        <main id="main-content" class="flex-1">
            @yield('content')
        </main>

        <footer class="bg-[color:var(--color-ink)] text-white">
            <div class="mx-auto w-full max-w-6xl px-5 py-14 grid gap-10 md:grid-cols-2 lg:grid-cols-4">
                <div class="space-y-4">
                    <h3 class="font-display text-xl">Hoàng Gia Việt Nam</h3>
                    <p class="text-white/70 text-sm">Công ty Cổ phần Địa kỹ thuật Hoàng Gia Việt Nam - Cung cấp dữ liệu tin cậy phục vụ xây dựng hạ tầng.</p>
                    <div class="flex items-center gap-3">
                        <a href="#" class="h-9 w-9 rounded-full border border-white/20 grid place-items-center text-white/80">F</a>
                        <a href="#" class="h-9 w-9 rounded-full border border-white/20 grid place-items-center text-white/80">Y</a>
                        <a href="#" class="h-9 w-9 rounded-full border border-white/20 grid place-items-center text-white/80">I</a>
                    </div>
                </div>
                <div class="space-y-3 text-sm">
                    <h4 class="font-display text-lg">Thông tin</h4>
                    <a href="/gioi-thieu" class="block text-white/70 hover:text-white">Về chúng tôi</a>
                    <a href="/du-an" class="block text-white/70 hover:text-white">Dự án tiêu biểu</a>
                    <a href="/chung-chi" class="block text-white/70 hover:text-white">Chứng chỉ</a>
                    <a href="/tin-tuc" class="block text-white/70 hover:text-white">Tin tức</a>
                    <a href="/chinh-sach-bao-mat" class="block text-white/70 hover:text-white">Chính sách bảo mật</a>
                </div>
                <div class="space-y-3 text-sm">
                    <h4 class="font-display text-lg">Dịch vụ</h4>
                    <a href="/dich-vu" class="block text-white/70 hover:text-white">Khảo sát địa chất</a>
                    <a href="/dich-vu" class="block text-white/70 hover:text-white">Khảo sát địa hình</a>
                    <a href="/dich-vu" class="block text-white/70 hover:text-white">Thí nghiệm vật liệu</a>
                </div>
                <div class="space-y-3 text-sm">
                    <h4 class="font-display text-lg">Liên hệ</h4>
                    <p class="text-white/70">Công ty Cổ phần Địa kỹ thuật Hoàng Gia Việt Nam</p>
                    <p class="text-white/70">Số 55 Cầu Cốn, P. Trần Hưng Đạo, TP Hải Dương, Tỉnh Hải Dương</p>
                    <p class="text-white/70">Hotline: 0982 461 026</p>
                    <p class="text-white/70">Email: Hientvxd7217@gmail.com</p>
                </div>
            </div>
            <div class="border-t border-white/10">
                <div class="mx-auto w-full max-w-6xl px-5 py-4 text-xs text-white/60 flex flex-wrap justify-between gap-2">
                    <span>© 2026 Công ty Cổ phần Địa kỹ thuật Hoàng Gia Việt Nam. Đã đăng ký bản quyền.</span>
                    <span>Thiết kế giao diện mẫu</span>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
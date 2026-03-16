<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Nam Mien Trung' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=be-vietnam-pro:300,400,500,600,700&family=fraunces:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-sand text-ink">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:bg-white focus:px-4 focus:py-2 focus:rounded-full">
        Bo qua noi dung dieu huong
    </a>
    <div class="min-h-screen flex flex-col">
        <div class="bg-[color:var(--color-ink)] text-white text-xs md:text-sm">
            <div class="mx-auto w-full max-w-6xl px-5 py-2 flex flex-wrap gap-3 items-center justify-between">
                <div class="flex flex-wrap gap-4 items-center">
                    <span class="flex items-center gap-2">
                        <span class="inline-block h-2 w-2 rounded-full bg-brand"></span>
                        Ho tro ky thuat: 0918 428 273
                    </span>
                    <span class="hidden md:inline">Email: nammientrungltd@gmail.com</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-white/70">Ninh Thuan - Nam Trung Bo</span>
                </div>
            </div>
        </div>

        <header class="sticky top-0 z-40 bg-sand/90 backdrop-blur border-b border-black/10">
            <div class="mx-auto w-full max-w-6xl px-5 py-4 flex items-center justify-between gap-6">
                <a href="/" class="flex items-center gap-3">
                    <span class="grid place-items-center h-11 w-11 rounded-full bg-brand text-white font-display text-lg">N</span>
                    <span class="flex flex-col leading-tight">
                        <span class="font-display text-lg">Nam Mien Trung</span>
                        <span class="text-xs uppercase tracking-[0.2em] text-black/60">Kiem dinh xay dung</span>
                    </span>
                </a>

                <nav class="hidden lg:flex items-center gap-6 text-sm font-medium">
                    <a href="/" class="hover:text-brand">Trang chu</a>
                    <a href="/gioi-thieu" class="hover:text-brand">Gioi thieu</a>
                    <a href="/dich-vu" class="hover:text-brand">Dich vu</a>
                    <a href="/du-an" class="hover:text-brand">Du an</a>
                    <a href="/tin-tuc" class="hover:text-brand">Tin tuc</a>
                    <a href="/lien-he" class="hover:text-brand">Lien he</a>
                </nav>

                <div class="flex items-center gap-3">
                    <a href="/lien-he" class="hidden sm:inline-flex items-center gap-2 rounded-full bg-brand px-5 py-2 text-white text-sm font-semibold shadow-soft">
                        Lien he ngay
                    </a>
                    <button class="lg:hidden inline-flex items-center justify-center h-10 w-10 rounded-full border border-black/15" aria-label="Mo menu" aria-expanded="false" aria-controls="mobile-nav" data-menu-toggle>
                        <span class="h-0.5 w-5 bg-black"></span>
                    </button>
                </div>
            </div>

            <div id="mobile-nav" class="lg:hidden hidden border-t border-black/10 bg-sand" data-menu-target>
                <div class="mx-auto w-full max-w-6xl px-5 py-4 flex flex-col gap-3 text-sm font-medium">
                    <a href="/" class="hover:text-brand">Trang chu</a>
                    <a href="/gioi-thieu" class="hover:text-brand">Gioi thieu</a>
                    <a href="/dich-vu" class="hover:text-brand">Dich vu</a>
                    <a href="/du-an" class="hover:text-brand">Du an</a>
                    <a href="/tin-tuc" class="hover:text-brand">Tin tuc</a>
                    <a href="/lien-he" class="hover:text-brand">Lien he</a>
                </div>
            </div>
        </header>

        <main id="main-content" class="flex-1">
            @yield('content')
        </main>

        <footer class="bg-[color:var(--color-ink)] text-white">
            <div class="mx-auto w-full max-w-6xl px-5 py-14 grid gap-10 md:grid-cols-2 lg:grid-cols-4">
                <div class="space-y-4">
                    <h3 class="font-display text-xl">Nam Mien Trung</h3>
                    <p class="text-white/70 text-sm">Don vi thi nghiem, kiem dinh va khao sat xay dung tai Nam Trung Bo.</p>
                    <div class="flex items-center gap-3">
                        <a href="#" class="h-9 w-9 rounded-full border border-white/20 grid place-items-center text-white/80">F</a>
                        <a href="#" class="h-9 w-9 rounded-full border border-white/20 grid place-items-center text-white/80">Y</a>
                        <a href="#" class="h-9 w-9 rounded-full border border-white/20 grid place-items-center text-white/80">I</a>
                    </div>
                </div>
                <div class="space-y-3 text-sm">
                    <h4 class="font-display text-lg">Thong tin</h4>
                    <a href="/gioi-thieu" class="block text-white/70 hover:text-white">Ve chung toi</a>
                    <a href="/du-an" class="block text-white/70 hover:text-white">Du an</a>
                    <a href="/tin-tuc" class="block text-white/70 hover:text-white">Tin tuc</a>
                    <a href="/chinh-sach-bao-mat" class="block text-white/70 hover:text-white">Chinh sach bao mat</a>
                </div>
                <div class="space-y-3 text-sm">
                    <h4 class="font-display text-lg">Dich vu</h4>
                    <a href="/giam-sat-va-tu-van-xay-dung" class="block text-white/70 hover:text-white">Giam sat & tu van</a>
                    <a href="/thi-nghiem-kiem-dinh-vat-lieu-xay-dung" class="block text-white/70 hover:text-white">Thi nghiem vat lieu</a>
                    <a href="/khao-sat-dia-chat-dia-hinh" class="block text-white/70 hover:text-white">Khao sat dia chat</a>
                </div>
                <div class="space-y-3 text-sm">
                    <h4 class="font-display text-lg">Lien he</h4>
                    <p class="text-white/70">147 Tran Phu, TP. Phan Rang - Thap Cham</p>
                    <p class="text-white/70">0918 428 273 - 0977 252 330</p>
                    <p class="text-white/70">nammientrungltd@gmail.com</p>
                </div>
            </div>
            <div class="border-t border-white/10">
                <div class="mx-auto w-full max-w-6xl px-5 py-4 text-xs text-white/60 flex flex-wrap justify-between gap-2">
                    <span>© 2026 Cong ty TNHH Nam Mien Trung. All rights reserved.</span>
                    <span>Thiet ke giao dien mau - Placeholder</span>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
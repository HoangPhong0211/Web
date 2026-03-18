@extends('layouts.app')

@section('content')
@php
$heroSlides = [
['/images/Picture1.png', 'Khảo sát địa kỹ thuật công trình'],
['/images/Picture2.png', 'Thí nghiệm hiện trường và trong phòng'],
['/images/Picture3.png', 'Tư vấn giải pháp nền móng và hạ tầng'],
['/images/Picture4.png', 'Kiểm định vật liệu xây dựng'],
];

$featuredServices = [
[
'title' => 'Khoan khảo sát địa chất',
'desc' => 'Khoan thăm dò, lấy mẫu, xác định điều kiện địa tầng phục vụ thiết kế móng.',
],
[
'title' => 'Thí nghiệm hiện trường / trong phòng',
'desc' => 'Thực hiện các phép thử cơ lý đất, đá và thí nghiệm hiện trường theo tiêu chuẩn áp dụng.',
],
[
'title' => 'Khảo sát địa hình',
'desc' => 'Đo đạc, lập bình đồ, cao độ và hồ sơ địa hình phục vụ quy hoạch - thi công.',
],
[
'title' => 'Thí nghiệm vật liệu xây dựng',
'desc' => 'Kiểm tra chất lượng vật liệu đầu vào và cấu kiện theo quy chuẩn hiện hành.',
],
];

$featuredProjects = [
['Cầu Kim Liên', '/images/Picture5.png'],
['Nhà máy Up Shine Lighting', '/images/Picture6.png'],
['Dự án pin TOPCON BOVIET', '/images/Picture7.png'],
['Cầu sông Hương', '/images/Picture8.png'],
];
@endphp

<section class="relative overflow-hidden border-b border-black/10">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(208,114,45,0.2),_transparent_60%)]"></div>
    <div class="relative mx-auto w-full max-w-6xl px-5 py-14 lg:py-20">
        <div class="space-y-5 max-w-3xl">
            <p class="text-sm uppercase tracking-[0.3em] text-black/60">Công ty Cổ phần Địa kỹ thuật Hoàng Gia Việt Nam</p>
            <h1 class="text-4xl md:text-5xl lg:text-5xl font-display text-gray-900">
                Địa Chất Hoàng Gia Việt Nam:
                <span class="block mt-1 italic text-center text-gray-800">Chuẩn dữ liệu – Vững hạ tầng.</span>
            </h1>
        </div>
        <p class="text-base md:text-lg text-black/70">
            Thành lập năm 2011, Hoàng Gia Việt Nam hoạt động với mã LAS-XD 1109 trong các lĩnh vực khảo sát,
            thí nghiệm và kiểm định, đồng hành cùng chủ đầu tư và nhà thầu trong các dự án hạ tầng, dân dụng, công nghiệp.
        </p>
        <div class="flex flex-wrap gap-3 text-sm font-medium">
            <span class="rounded-full bg-white px-4 py-2 border border-black/10">Chính xác</span>
            <span class="rounded-full bg-white px-4 py-2 border border-black/10">An toàn</span>
            <span class="rounded-full bg-white px-4 py-2 border border-black/10">Hiệu quả</span>
            <span class="rounded-full bg-white px-4 py-2 border border-black/10">Bền vững</span>
        </div>
    </div>

    <div class="mt-8 overflow-x-auto no-scrollbar">
        <div class="flex gap-4 min-w-max">
            @foreach ($heroSlides as [$image, $caption])
            <article class="w-[80vw] max-w-[560px] rounded-3xl overflow-hidden border border-black/10 bg-white shadow-soft">
                <img src="{{ $image }}" alt="{{ $caption }}" class="aspect-[16/9] w-full object-cover">
                <p class="p-4 text-sm font-medium">{{ $caption }}</p>
            </article>
            @endforeach
        </div>
    </div>

    <div class="mt-8 flex flex-wrap gap-4">
        <a href="/dich-vu" class="inline-flex items-center justify-center rounded-full bg-brand px-6 py-3 text-white font-semibold">Xem lĩnh vực hoạt động</a>
        <a href="/lien-he" class="inline-flex items-center justify-center rounded-full border border-black/20 px-6 py-3 font-semibold">Liên hệ nhận hồ sơ năng lực</a>
    </div>
    </div>
</section>

<section class="mx-auto w-full max-w-6xl px-5 py-14">
    <div class="flex items-end justify-between gap-6">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Dịch vụ / Lĩnh vực hoạt động</p>
            <h2 class="text-3xl md:text-4xl font-display">Dịch vụ nổi bật</h2>
        </div>
    </div>
    <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        @foreach ($featuredServices as $service)
        <article class="rounded-3xl border border-black/10 bg-white p-6 shadow-soft">
            <div class="h-11 w-11 rounded-2xl bg-brand/15 grid place-items-center text-brand font-semibold">{{ $loop->iteration }}</div>
            <h3 class="mt-4 text-xl font-display">{{ $service['title'] }}</h3>
            <p class="mt-3 text-sm text-black/70">{{ $service['desc'] }}</p>
        </article>
        @endforeach
    </div>
</section>

<section class="bg-[color:var(--color-ink)] text-white">
    <div class="mx-auto w-full max-w-6xl px-5 py-16 grid gap-10 lg:grid-cols-[1fr_1fr] items-center">
        <div class="space-y-4">
            <p class="text-sm uppercase tracking-[0.3em] text-white/60">Năng lực thiết bị</p>
            <h2 class="text-3xl md:text-4xl font-display">Thiết bị và chứng nhận nổi bật</h2>
            <p class="text-white/70">
                Hệ thống máy khoan XY-1, thiết bị xuyên tĩnh CPT cùng quy trình kiểm soát chất lượng chặt chẽ giúp dữ liệu
                khảo sát và thí nghiệm luôn có độ tin cậy cao, phục vụ thiết kế và thi công an toàn.
            </p>
            <div class="grid gap-4 text-sm">
                <a href="{{ route('certificates') }}#xy1" class="block rounded-2xl border border-white/15 p-4 transition hover:border-white/40 hover:bg-white/5">
                    <p class="font-semibold">Máy thử độ bền nén TYE-2000</p>
                    <p class="text-white/70 mt-1">Thực hiện thí nghiệm xác định cường độ chịu nén của các mẫu vật liệu xây dựng với độ chính xác cao.</p>
                </a>
                <a href="{{ route('certificates') }}#maycatdat" class="block rounded-2xl border border-white/15 p-4 transition hover:border-white/40 hover:bg-white/5">
                    <p class="font-semibold">Máy cắt đất ZJ</p>
                    <p class="text-white/70 mt-1">Thiết bị chuyên dụng để xác định nhanh chóng và tin cậy các đặc trưng sức chống cắt của nền đất.</p>
                </a>
            </div>
        </div>
        <div class="rounded-[32px] bg-white/5 p-8 grid gap-5">
            <a href="{{ route('certificates') }}" class="block rounded-3xl bg-white/10 p-6 transition hover:bg-white/15">
                <p class="text-xs uppercase tracking-[0.3em] text-white/60">Chứng chỉ</p>
                <p class="mt-2 font-display text-2xl">ISO & LAS-XD 1109</p>
                <p class="mt-2 text-white/70 text-sm">Hệ thống quản lý và năng lực phòng thí nghiệm theo phạm vi được cấp phép.</p>
            </a>
            <div class="rounded-3xl bg-white/10 p-6">
                <p class="text-xs uppercase tracking-[0.3em] text-white/60">Cam kết</p>
                <p class="mt-2 font-display text-2xl">Chính xác - An toàn - Hiệu quả - Bền vững</p>
                <p class="mt-2 text-white/70 text-sm">Bộ tiêu chí xuyên suốt trong mọi hoạt động khảo sát và thí nghiệm.</p>
            </div>
        </div>
    </div>
</section>

<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Dự án tiêu biểu</p>
            <h2 class="text-3xl md:text-4xl font-display">Các công trình đã thực hiện</h2>
        </div>
        <a href="/du-an" class="text-sm font-semibold text-brand">Xem tất cả dự án</a>
    </div>
    <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        @foreach ($featuredProjects as [$projectName, $image])
        <button
            type="button"
            class="group rounded-3xl overflow-hidden bg-white border border-black/10 shadow-soft text-left"
            data-project-image="{{ $image }}"
            data-project-name="{{ $projectName }}"
            aria-label="Xem ảnh lớn dự án {{ $projectName }}">
            <img src="{{ $image }}" alt="{{ $projectName }}" class="aspect-[4/3] w-full object-cover transition duration-300 group-hover:scale-[1.02]">
            <div class="p-4">
                <h3 class="font-display text-xl">{{ $projectName }}</h3>
                <p class="mt-2 text-sm text-black/60">Bấm để xem ảnh lớn</p>
            </div>
        </button>
        @endforeach
    </div>

    <div id="project-image-modal" class="fixed inset-0 z-[80] hidden items-center justify-center p-4 sm:p-6">
        <button type="button" class="absolute inset-0 bg-black/75" data-project-close aria-label="Đóng xem ảnh"></button>
        <div class="relative z-10 w-full max-w-5xl rounded-2xl bg-white p-2 shadow-2xl">
            <button
                type="button"
                class="absolute right-3 top-3 h-10 w-10 rounded-full bg-black/75 text-white text-2xl leading-none"
                data-project-close
                aria-label="Đóng">
                &times;
            </button>
            <img id="project-image-modal-img" src="" alt="" class="max-h-[80vh] w-full rounded-xl object-contain bg-black/5">
            <p id="project-image-modal-caption" class="px-3 py-2 text-sm text-black/70"></p>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('project-image-modal');
        const modalImage = document.getElementById('project-image-modal-img');
        const modalCaption = document.getElementById('project-image-modal-caption');
        const openButtons = document.querySelectorAll('[data-project-image]');
        const closeButtons = document.querySelectorAll('[data-project-close]');

        if (!modal || !modalImage || !modalCaption || openButtons.length === 0) {
            return;
        }

        const openModal = function(image, name) {
            modalImage.src = image;
            modalImage.alt = name;
            modalCaption.textContent = name;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        };

        const closeModal = function() {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            modalImage.src = '';
            modalImage.alt = '';
            modalCaption.textContent = '';
            document.body.classList.remove('overflow-hidden');
        };

        openButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                openModal(button.dataset.projectImage, button.dataset.projectName);
            });
        });

        closeButtons.forEach(function(button) {
            button.addEventListener('click', closeModal);
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && modal.classList.contains('flex')) {
                closeModal();
            }
        });
    });
</script>

<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-black/50">Góc tin tức</p>
            <h2 class="text-3xl md:text-4xl font-display">Bài viết mới nhất</h2>
        </div>
        <a href="/tin-tuc" class="text-sm font-semibold text-brand">Xem tất cả</a>
    </div>
    <div class="mt-8 grid gap-6 md:grid-cols-3">
        @forelse ($latestPosts ?? [] as $item)
        <a href="{{ route('posts.show', $item->slug) }}" class="rounded-3xl border border-black/10 bg-white overflow-hidden shadow-soft">
            {{-- SỬA LOGIC HIỂN THỊ ẢNH TẠI ĐÂY --}}
            @if ($item->featured_image)
            @php
            $img = $item->featured_image;
            // Kiểm tra nếu là URL hoặc chứa 'images/' thì dùng asset() trực tiếp, ngược lại thêm 'images/'
            $imagePath = (str_starts_with($img, 'http') || str_contains($img, 'images/'))
            ? asset($img)
            : asset('images/' . $img);
            @endphp
            <img src="{{ $imagePath }}"
                alt="{{ $item->title }}"
                class="aspect-[4/3] w-full object-cover transition duration-300 hover:scale-105"
                onerror="this.onerror=null;this.src='{{ asset('images/main-logo.png') }}';">
            @else
            <div class="aspect-[4/3] bg-[linear-gradient(120deg,_#f3d3bf,_#f9f2e7)] flex items-center justify-center">
                <i class="fa fa-image text-black/10 text-4xl"></i>
            </div>
            @endif

            <div class="p-5">
                <p class="text-xs uppercase tracking-[0.3em] text-black/50">Tin mới</p>
                <h3 class="mt-2 font-display text-xl">{{ $item->title }}</h3>
                <p class="mt-2 text-sm text-black/60">{{ \Illuminate\Support\Str::limit(strip_tags($item->excerpt ?: $item->content), 120) }}</p>
            </div>
        </a>
        @empty
        <div class="rounded-3xl border border-black/10 bg-white p-6 text-sm text-black/60 col-span-3 text-center">
            Chưa có bài viết. Hãy thêm bài viết để hiển thị tại đây.
        </div>
        @endforelse
    </div>
</section>
@endsection
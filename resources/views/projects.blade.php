@extends('layouts.app')

@section('content')
<section class="mx-auto w-full max-w-6xl px-5 py-16">
    <div class="space-y-4">
        <p class="text-sm uppercase tracking-[0.3em] text-black/50">Dự án tiêu biểu</p>
        <h1 class="text-4xl md:text-5xl font-display">Hồ sơ công trình đã thực hiện</h1>
        <p class="text-black/70 max-w-3xl">Dự án được phân nhóm theo loại hình để thuận tiện tra cứu: Cầu/đường cao tốc, nhà máy công nghiệp và khu đô thị - dân cư.</p>
    </div>

    <div x-data="{ tab: 'bridge', modalOpen: false, modalImage: '', modalName: '' }" class="mt-10 space-y-6" @keydown.escape.window="modalOpen = false">
        <div class="flex flex-wrap gap-3">
            <button @click="tab = 'bridge'" :class="tab === 'bridge' ? 'bg-brand text-white' : 'bg-white'" class="rounded-full border border-black/15 px-5 py-2 font-semibold">Cầu / Đường cao tốc</button>
            <button @click="tab = 'factory'" :class="tab === 'factory' ? 'bg-brand text-white' : 'bg-white'" class="rounded-full border border-black/15 px-5 py-2 font-semibold">Nhà máy công nghiệp</button>
            <button @click="tab = 'urban'" :class="tab === 'urban' ? 'bg-brand text-white' : 'bg-white'" class="rounded-full border border-black/15 px-5 py-2 font-semibold">Khu đô thị - dân cư</button>
        </div>

        <div x-show="tab === 'bridge'" class="grid gap-6 md:grid-cols-2">
            @foreach ([
            ['Cầu sông Hương', '/images/Picture6.png'],
            ['Cầu Kim Liên', '/images/Picture1.png'],
            ['Địa chất công trình', '/images/Picture5.png'],
            ['Trung tâm hành chính', '/images/Picture8.png'],
            ] as [$name, $img])
            <button
                type="button"
                @click="modalOpen = true; modalImage = '{{ $img }}'; modalName = '{{ $name }}'"
                class="group rounded-3xl border border-black/10 bg-white overflow-hidden shadow-soft text-left">
                <img src="{{ $img }}" alt="{{ $name }}" class="aspect-[4/3] w-full object-cover transition duration-300 group-hover:scale-[1.02]">
                <div class="p-5">
                    <h3 class="font-display text-2xl">{{ $name }}</h3>
                    <p class="mt-2 text-sm text-black/60">Ninh Thuận · 2024</p>
                    <p class="mt-3 text-sm text-black/60">Thông tin mô tả ngắn về phạm vi tư vấn, giám sát và kiểm định.</p>
                    <p class="mt-2 text-sm text-brand font-medium">Bấm để xem ảnh lớn</p>
                </div>
            </button>
            @endforeach
        </div>

        <div x-show="tab === 'factory'" class="grid gap-6 md:grid-cols-2">
            @foreach ([
            ['Nhà máy Up Shine Lighting', '/images/Picture9.png'],
            ['Nhà máy CDC LEASING', '/images/Picture10.png'],
            ['Dự án pin TOPCON BOVIET', '/images/Picture11.png'],
            ['Hạ tầng khu công nghiệp', '/images/Picture4.png'],
            ] as [$name, $img])
            <button
                type="button"
                @click="modalOpen = true; modalImage = '{{ $img }}'; modalName = '{{ $name }}'"
                class="group rounded-3xl border border-black/10 bg-white overflow-hidden shadow-soft text-left">
                <img src="{{ $img }}" alt="{{ $name }}" class="aspect-[4/3] w-full object-cover transition duration-300 group-hover:scale-[1.02]">
                <div class="p-5">
                    <h3 class="font-display text-2xl">{{ $name }}</h3>
                    <p class="mt-2 text-sm text-black/60">Bình Thuận · 2023</p>
                    <p class="mt-3 text-sm text-black/60">Thông tin mô tả ngắn về phạm vi tư vấn, giám sát và kiểm định.</p>
                    <p class="mt-2 text-sm text-brand font-medium">Bấm để xem ảnh lớn</p>
                </div>
            </button>
            @endforeach
        </div>

        <div x-show="tab === 'urban'" class="grid gap-6 md:grid-cols-2">
            @foreach ([
            ['Trường THCS Nhân Huệ', '/images/Picture2.png'],
            ['Khu dân cư mở rộng', '/images/Picture3.png'],
            ['Hạ tầng khu đô thị mới', '/images/Picture4.png'],
            ['Khu nghỉ dưỡng sinh thái', '/images/Picture7.png'],
            ] as [$name, $img])
            <button
                type="button"
                @click="modalOpen = true; modalImage = '{{ $img }}'; modalName = '{{ $name }}'"
                class="group rounded-3xl border border-black/10 bg-white overflow-hidden shadow-soft text-left">
                <img src="{{ $img }}" alt="{{ $name }}" class="aspect-[4/3] w-full object-cover transition duration-300 group-hover:scale-[1.02]">
                <div class="p-5">
                    <h3 class="font-display text-2xl">{{ $name }}</h3>
                    <p class="mt-2 text-sm text-black/60">Phú Yên · 2021</p>
                    <p class="mt-3 text-sm text-black/60">Thông tin mô tả ngắn về phạm vi tư vấn, giám sát và kiểm định.</p>
                    <p class="mt-2 text-sm text-brand font-medium">Bấm để xem ảnh lớn</p>
                </div>
            </button>
            @endforeach
        </div>

        <div x-show="modalOpen" x-transition class="fixed inset-0 z-[90] flex items-center justify-center p-4 sm:p-6" style="display: none;">
            <button type="button" class="absolute inset-0 bg-black/75" @click="modalOpen = false" aria-label="Đóng xem ảnh"></button>
            <div class="relative z-10 w-full max-w-5xl rounded-2xl bg-white p-2 shadow-2xl">
                <button
                    type="button"
                    class="absolute right-3 top-3 h-10 w-10 rounded-full bg-black/75 text-white text-2xl leading-none"
                    @click="modalOpen = false"
                    aria-label="Đóng">
                    &times;
                </button>
                <img :src="modalImage" :alt="modalName" class="max-h-[80vh] w-full rounded-xl object-contain bg-black/5">
                <p class="px-3 py-2 text-sm text-black/70" x-text="modalName"></p>
            </div>
        </div>
    </div>
</section>
@endsection
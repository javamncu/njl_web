@extends('layouts.app')

@section('title', __('Negara Jaya Logistik - Solusi Logistik Terpercaya'))

@section('content')

    {{-- ===================== HERO ===================== --}}
    <section id="beranda" class="relative isolate w-full min-h-115 overflow-hidden sm:aspect-1844/528">
        {{-- Background slider --}}
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div id="heroSlidesTrack" class="flex h-full w-full transition-transform duration-700 ease-out">
                <picture class="h-full w-full shrink-0">
                    <source media="(min-width: 768px)" srcset="{{ asset('njl_hero_atas1.webp') }}">
                    <img src="{{ asset('njl_hero_atas_1_mobile.webp') }}" alt=""
                         class="h-full w-full object-cover object-left brightness-[.82] select-none md:brightness-100" draggable="false">
                </picture>
                <picture class="h-full w-full shrink-0">
                    <source media="(min-width: 768px)" srcset="{{ asset('njl_hero_atas2.webp') }}">
                    <img src="{{ asset('njl_hero_atas_2_mobile.webp') }}" alt=""
                         class="h-full w-full object-cover object-left select-none" draggable="false">
                </picture>
                <picture class="h-full w-full shrink-0">
                    <source media="(min-width: 768px)" srcset="{{ asset('njl_hero_atas33.png') }}">
                    <img src="{{ asset('njl_hero_atas_3_mobile.webp') }}" alt=""
                         class="h-full w-full object-cover object-left select-none" draggable="false">
                </picture>
            </div>
        </div>

        <div class="flex min-h-115 w-full items-center px-6 sm:h-full sm:min-h-0 sm:px-10 lg:px-16 xl:px-24">
            <div class="w-full min-w-0 max-w-lg">
                <p class="text-base font-bold uppercase tracking-[0.18em] text-gold sm:text-lg">
                    {{ __('Fast, Safe & Trusted') }}
                </p>

                <h1 id="heroHeading"
                    class="mt-3 text-3xl font-extrabold uppercase leading-[0.95] text-shadow-lg transition-colors duration-500 sm:text-4xl sm:text-shadow-none lg:text-5xl">
                    {!! str_replace(' ', '<br>', __('Logistics Solution')) !!}
                </h1>

                <p id="heroParagraph"
                   class="mt-4 max-w-md text-sm font-semibold leading-relaxed text-shadow-lg transition-colors duration-500 sm:text-base sm:text-shadow-none">
                    {{ __('Solusi pengiriman barang domestik dan internasional yang cepat, aman, dan terpercaya untuk mendukung bisnis Anda.') }}
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="#tentang"
                       class="inline-flex items-center gap-2 rounded-lg bg-navy px-5 py-2.5 text-xs font-semibold uppercase tracking-wide text-white shadow-lg transition hover:bg-navy-light sm:text-sm">
                        {{ __('Tentang Kami') }}
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                    <a href="#layanan"
                       class="inline-flex items-center gap-2 rounded-lg bg-white px-5 py-2.5 text-xs font-semibold uppercase tracking-wide text-navy shadow-lg ring-1 ring-slate-200 transition hover:bg-slate-50 sm:text-sm">
                        {{ __('Layanan Kami') }}
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Tombol prev (di bawah tombol pada mobile, di tengah pada md+) --}}
        <button id="heroPrev" type="button"
                class="absolute bottom-4 left-1/4 z-20 flex h-10 w-10 cursor-pointer items-center justify-center rounded-full bg-white/80 text-navy shadow-md backdrop-blur transition hover:bg-white md:top-1/2 md:bottom-auto md:left-5 md:h-12 md:w-12 md:-translate-y-1/2"
                aria-label="{{ __('Slide sebelumnya') }}">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        {{-- Tombol next (di bawah tombol pada mobile, di tengah pada md+) --}}
        <button id="heroNext" type="button"
                class="absolute right-1/4 bottom-4 z-20 flex h-10 w-10 cursor-pointer items-center justify-center rounded-full bg-white/80 text-navy shadow-md backdrop-blur transition hover:bg-white md:top-1/2 md:right-5 md:bottom-auto md:h-12 md:w-12 md:-translate-y-1/2"
                aria-label="{{ __('Slide berikutnya') }}">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </section>

    {{-- Script slider hero --}}
    <script>
        (function () {
            const track = document.getElementById('heroSlidesTrack');
            if (!track) return;
            const total = track.children.length;
            if (total < 2) return;
            const prevBtn = document.getElementById('heroPrev');
            const nextBtn = document.getElementById('heroNext');
            const wrap = document.getElementById('beranda');

            let index = 0;
            let autoTimer;
            const AUTO_MS = 5000;

            function applyTransform(offsetPct) {
                track.style.transform = 'translateX(' + offsetPct + '%)';
            }
            const paragraph = document.getElementById('heroParagraph');
            const heading = document.getElementById('heroHeading');
            function updateColors() {
                // Mobile: semua slide putih.
                // PC (md+): slide 1 = navy, slide 2 = heading slate-200 + paragraf putih, slide 3 = putih.
                if (heading) {
                    heading.classList.remove('text-navy', 'text-white', 'md:text-navy', 'md:text-slate-200', 'md:text-white');
                    heading.classList.add('text-white');
                    if (index === 0) heading.classList.add('md:text-navy');
                    else if (index === 1) heading.classList.add('md:text-slate-200');
                    else heading.classList.add('md:text-white');
                }
                if (paragraph) {
                    paragraph.classList.remove('text-navy', 'text-white', 'md:text-navy', 'md:text-white');
                    paragraph.classList.add('text-white');
                    if (index === 0) paragraph.classList.add('md:text-navy');
                    else paragraph.classList.add('md:text-white');
                }
            }
            function goTo(i) {
                index = ((i % total) + total) % total;
                track.style.transition = '';
                applyTransform(-index * 100);
                updateColors();
            }
            function next() { goTo(index + 1); }
            function prev() { goTo(index - 1); }

            function startAuto() { stopAuto(); autoTimer = setInterval(next, AUTO_MS); }
            function stopAuto() { if (autoTimer) clearInterval(autoTimer); }

            prevBtn.addEventListener('click', function () { prev(); startAuto(); });
            nextBtn.addEventListener('click', function () { next(); startAuto(); });

            // Drag / swipe
            let startX = null;
            let delta = 0;
            let dragging = false;

            function onStart(e) {
                if (e.target.closest('button, a, [data-no-drag]')) return;
                const x = e.touches ? e.touches[0].clientX : e.clientX;
                startX = x;
                delta = 0;
                dragging = true;
                track.style.transition = 'none';
                stopAuto();
            }
            function onMove(e) {
                if (!dragging || startX === null) return;
                const x = e.touches ? e.touches[0].clientX : e.clientX;
                delta = x - startX;
                const slideWidth = wrap.offsetWidth || 1;
                applyTransform(-index * 100 + (delta / slideWidth) * 100);
            }
            function onEnd() {
                if (!dragging) return;
                dragging = false;
                track.style.transition = '';
                const slideWidth = wrap.offsetWidth || 1;
                const threshold = slideWidth * 0.15;
                if (delta < -threshold) next();
                else if (delta > threshold) prev();
                else goTo(index);
                startX = null;
                delta = 0;
                startAuto();
            }

            wrap.addEventListener('mousedown', onStart);
            wrap.addEventListener('mousemove', onMove);
            wrap.addEventListener('mouseup', onEnd);
            wrap.addEventListener('mouseleave', onEnd);
            wrap.addEventListener('touchstart', onStart, { passive: true });
            wrap.addEventListener('touchmove', onMove, { passive: true });
            wrap.addEventListener('touchend', onEnd);

            goTo(0);
            startAuto();
        })();
    </script>

    {{-- ===================== TENTANG KAMI ===================== --}}
    <section id="tentang" class="bg-white py-16 lg:py-20">
        <div class="px-6 sm:px-10 lg:px-16 xl:px-24">
            <div class="grid items-center gap-10 md:grid-cols-[18rem_1fr] md:gap-8 lg:grid-cols-[20rem_1fr] lg:gap-10">
                {{-- Foto --}}
                <div>
                    <img src="{{ asset('tentang_kami_rev1_webp.webp') }}" alt="Tentang Negara Jaya Logistik"
                         class="aspect-square w-full rounded-2xl object-cover shadow-xl">
                </div>

                {{-- Teks --}}
                <div>
                    <p class="text-xl font-bold uppercase tracking-wide text-gold sm:text-2xl">
                        {{ __('Tentang Kami') }}
                    </p>
                    <h2 class="mt-3 text-2xl font-bold leading-tight text-gold sm:text-3xl lg:text-4xl">
                        {{ __('Solusi Logistik Terpercaya') }}<br>{{ __('untuk Bisnis Anda') }}
                    </h2>
                    <p class="mt-5 max-w-2xl text-lg leading-relaxed text-navy sm:text-xl">
                        {{ __('Negara Jaya Logistik adalah perusahaan yang bergerak di bidang jasa pengiriman dan distribusi barang domestik maupun internasional dengan komitmen memberikan pelayanan terbaik, cepat, aman, dan terpercaya.') }}
                    </p>
                </div>
            </div>

            {{-- Garis pembatas --}}
            <hr class="mt-16 border-slate-300 lg:mt-20">
        </div>
    </section>

    {{-- ===================== LAYANAN KAMI ===================== --}}
    <section id="layanan" class="bg-white py-16 lg:py-20">
        <div class="px-6 sm:px-10 lg:px-16 xl:px-24">
            {{-- Header --}}
            <div class="text-center">
                <p class="text-xl font-bold uppercase tracking-wide text-gold sm:text-2xl">
                    {{ __('Layanan Kami') }}
                </p>
                <h2 class="mt-2 text-2xl font-bold text-navy sm:text-3xl lg:text-4xl">
                    {{ __('Layanan Logistik Terlengkap') }}
                </h2>
            </div>

            {{-- Grid ikon layanan (klik buka modal foto dokumentasi) --}}
            <div class="mt-10 grid grid-cols-2 gap-4 sm:grid-cols-3 sm:gap-5 lg:grid-cols-6 lg:mt-14">
                @foreach ($services as $service)
                    <button type="button"
                            class="cursor-pointer text-left transition hover:-translate-y-1 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand focus-visible:ring-offset-2"
                            data-service-trigger
                            data-service-name="{{ __($service['name']) }}"
                            data-service-photos='@json($service['photos'])'>
                        <img src="{{ asset('icon_layanan/' . $service['icon']) }}"
                             alt="{{ __($service['name']) }}"
                             class="w-full">
                    </button>
                @endforeach
            </div>

            {{-- Garis pembatas --}}
            <hr class="mt-16 border-slate-300 lg:mt-20">
        </div>
    </section>

    {{-- ===================== GALERI ===================== --}}
    @php
        // Bagi foto jadi 2 baris seimbang
        $rows = array_chunk($galeri, (int) ceil(count($galeri) / 2));
    @endphp

    <section id="galeri" class="bg-white py-16 lg:py-20">
        <div class="px-6 sm:px-10 lg:px-16 xl:px-24">
            {{-- Header --}}
            <div class="text-center">
                <p class="text-xl font-bold uppercase tracking-wide text-gold sm:text-2xl">
                    {{ __('Galeri Kami') }}
                </p>
                <h2 class="mt-2 text-2xl font-bold text-navy sm:text-3xl lg:text-4xl">
                    {{ __('Dokumentasi Pengerjaan') }}
                </h2>
            </div>
        </div>

        {{-- Slider 2 baris: full-bleed agar foto bisa "mengintip" di tepi kanan --}}
        <div class="mt-10 space-y-5 lg:mt-14 lg:space-y-6">
            @foreach ($rows as $row)
                <div class="drag-scroll no-scrollbar flex cursor-grab gap-4 overflow-x-auto scroll-smooth px-6 pb-3 select-none sm:gap-5 sm:px-10 lg:px-16 xl:px-24">
                    @foreach ($row as $file)
                        <img src="{{ asset('galeri_kami/' . $file) }}"
                             alt="Galeri Negara Jaya Logistik"
                             draggable="false"
                             class="aspect-square w-48 shrink-0 rounded-2xl object-cover shadow-md shadow-black/10 sm:w-56 lg:w-64">
                    @endforeach
                </div>
            @endforeach
        </div>

        {{-- Garis pembatas --}}
        <div class="mt-10 px-6 sm:px-10 lg:mt-14 lg:px-16 xl:px-24">
            <hr class="border-slate-300">
        </div>
    </section>

    {{-- Drag-to-scroll untuk slider galeri --}}
    <script>
        document.querySelectorAll('.drag-scroll').forEach(function (el) {
            let down = false, startX = 0, startScroll = 0;
            el.addEventListener('mousedown', function (e) {
                down = true;
                startX = e.pageX - el.offsetLeft;
                startScroll = el.scrollLeft;
                el.style.cursor = 'grabbing';
            });
            const stop = function () { down = false; el.style.cursor = 'grab'; };
            el.addEventListener('mouseleave', stop);
            el.addEventListener('mouseup', stop);
            el.addEventListener('mousemove', function (e) {
                if (!down) return;
                e.preventDefault();
                const x = e.pageX - el.offsetLeft;
                el.scrollLeft = startScroll - (x - startX);
            });
        });
    </script>

    {{-- ===================== KENAPA MEMILIH KAMI ===================== --}}
    <section id="kenapa" class="border-b-2 border-white bg-navy py-12 lg:py-16">
        <div class="px-6 sm:px-10 lg:px-16 xl:px-24">
            <h2 class="text-center text-2xl font-extrabold uppercase tracking-wide text-white sm:text-3xl lg:text-4xl">
                {{ __('Kenapa Memilih Kami') }}
            </h2>

            <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:mt-12 lg:grid-cols-5 lg:gap-4">
                @foreach ($features as $feature)
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('icon_njl_kenapa_memilih_kami/' . $feature['icon']) }}"
                             alt="{{ __($feature['label']) }}"
                             class="h-14 w-14 shrink-0 sm:h-16 sm:w-16">
                        <p class="text-sm font-bold uppercase leading-tight text-white sm:text-base">
                            {{ __($feature['label']) }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== MODAL DOKUMENTASI LAYANAN (CAROUSEL) ===================== --}}
    <div id="serviceModal"
         class="fixed inset-0 z-100 hidden items-center justify-center px-4 py-8 sm:px-6"
         role="dialog" aria-modal="true" aria-labelledby="serviceModalTitle">

        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" data-modal-close></div>

        {{-- Card --}}
        <div class="relative w-full max-w-4xl overflow-hidden rounded-2xl bg-white shadow-2xl">
            {{-- Tombol close --}}
            <button type="button"
                    class="absolute top-4 right-4 z-20 flex h-10 w-10 cursor-pointer items-center justify-center rounded-full bg-navy text-white shadow-lg transition hover:bg-navy-light focus:outline-none focus-visible:ring-2 focus-visible:ring-gold focus-visible:ring-offset-2"
                    data-modal-close aria-label="{{ __('Tutup') }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            {{-- Header --}}
            <div class="border-b border-slate-200 bg-slate-50 px-6 py-5 sm:px-8">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-gold sm:text-sm">
                    {{ __('Dokumentasi Layanan') }}
                </p>
                <h3 id="serviceModalTitle" class="mt-1 pr-10 text-xl font-bold text-navy sm:text-2xl"></h3>
            </div>

            {{-- Body carousel --}}
            <div class="relative bg-slate-50 px-4 py-6 sm:px-12 sm:py-8">
                {{-- Empty state --}}
                <p id="serviceModalEmpty" class="hidden py-16 text-center text-sm text-slate-500">
                    {{ __('Foto segera hadir.') }}
                </p>

                {{-- Foto utama --}}
                <div id="serviceModalImageWrap" class="flex min-h-60 items-center justify-center">
                    <img id="serviceModalImage" src="" alt=""
                         class="block max-h-[65vh] w-auto rounded-lg object-contain shadow-md">
                </div>

                {{-- Tombol prev --}}
                <button id="serviceModalPrev" type="button"
                        class="absolute top-1/2 left-2 z-10 flex h-11 w-11 -translate-y-1/2 cursor-pointer items-center justify-center rounded-full bg-white text-navy shadow-lg ring-1 ring-slate-200 transition hover:bg-navy hover:text-white sm:left-4"
                        aria-label="{{ __('Foto sebelumnya') }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                {{-- Tombol next --}}
                <button id="serviceModalNext" type="button"
                        class="absolute top-1/2 right-2 z-10 flex h-11 w-11 -translate-y-1/2 cursor-pointer items-center justify-center rounded-full bg-white text-navy shadow-lg ring-1 ring-slate-200 transition hover:bg-navy hover:text-white sm:right-4"
                        aria-label="{{ __('Foto berikutnya') }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                {{-- Counter --}}
                <p id="serviceModalCounter"
                   class="mt-4 text-center text-sm font-semibold text-navy">
                    1 / 1
                </p>
            </div>
        </div>
    </div>

    {{-- Script carousel modal --}}
    <script>
        (function () {
            const modal = document.getElementById('serviceModal');
            if (!modal) return;
            const titleEl = document.getElementById('serviceModalTitle');
            const imageEl = document.getElementById('serviceModalImage');
            const imageWrap = document.getElementById('serviceModalImageWrap');
            const emptyEl = document.getElementById('serviceModalEmpty');
            const counterEl = document.getElementById('serviceModalCounter');
            const prevBtn = document.getElementById('serviceModalPrev');
            const nextBtn = document.getElementById('serviceModalNext');

            let photos = [];
            let index = 0;

            function render() {
                if (!photos.length) {
                    emptyEl.classList.remove('hidden');
                    imageWrap.classList.add('hidden');
                    prevBtn.classList.add('hidden');
                    nextBtn.classList.add('hidden');
                    counterEl.classList.add('hidden');
                    return;
                }
                emptyEl.classList.add('hidden');
                imageWrap.classList.remove('hidden');
                counterEl.classList.remove('hidden');
                imageEl.src = photos[index];
                counterEl.textContent = (index + 1) + ' / ' + photos.length;
                if (photos.length > 1) {
                    prevBtn.classList.remove('hidden');
                    nextBtn.classList.remove('hidden');
                } else {
                    prevBtn.classList.add('hidden');
                    nextBtn.classList.add('hidden');
                }
            }

            function next() {
                if (!photos.length) return;
                index = (index + 1) % photos.length;
                render();
            }

            function prev() {
                if (!photos.length) return;
                index = (index - 1 + photos.length) % photos.length;
                render();
            }

            function openModal(name, list) {
                titleEl.textContent = name;
                photos = list || [];
                index = 0;
                render();
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
            }

            document.querySelectorAll('[data-service-trigger]').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const name = btn.dataset.serviceName;
                    let list = [];
                    try { list = JSON.parse(btn.dataset.servicePhotos || '[]'); } catch (e) {}
                    openModal(name, list);
                });
            });

            modal.querySelectorAll('[data-modal-close]').forEach(function (el) {
                el.addEventListener('click', closeModal);
            });
            prevBtn.addEventListener('click', prev);
            nextBtn.addEventListener('click', next);

            document.addEventListener('keydown', function (e) {
                if (modal.classList.contains('hidden')) return;
                if (e.key === 'Escape') closeModal();
                else if (e.key === 'ArrowLeft') prev();
                else if (e.key === 'ArrowRight') next();
            });
        })();
    </script>

@endsection

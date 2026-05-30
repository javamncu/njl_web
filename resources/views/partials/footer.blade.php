@php
    $layanan = [
        'Freight Forwarding', 'Custom Ex-Im (ppjk)', 'Trucking / Dorring', 'Shipping Cont',
        'LCT', 'Barge', 'Tanker', 'MV',
        'Rent Heavy Lift Equipment', 'Project Handling', 'Stevedoring (PBM)', 'Warehousing',
    ];

    $informasi = [
        ['label' => 'Tentang Kami',       'href' => '#tentang'],
        ['label' => 'Galeri',             'href' => '#galeri'],
        ['label' => 'Artikel',            'href' => '#'],
        ['label' => 'Karir',              'href' => '#'],
        ['label' => 'Kebijakan Privasi',  'href' => '#'],
        ['label' => 'Syarat & Ketentuan', 'href' => '#'],
    ];

    $kontak = [
        ['type' => 'phone', 'label' => '0811 5017 265 (Rory)',   'href' => 'tel:+628115017265'],
        ['type' => 'phone', 'label' => '0823 5193 1454 (Riski)', 'href' => 'tel:+6282351931454'],
        ['type' => 'mail',  'label' => 'rorynegara@njlog.com',   'href' => 'mailto:rorynegara@njlog.com'],
        ['type' => 'mail',  'label' => 'anggariski79@njlog.com', 'href' => 'mailto:anggariski79@njlog.com'],
    ];

    $alamat = [
        [
            'title' => 'Head Office:',
            'body'  => 'Pertokoan Jummpolan No. 9, Banjarbaru',
            'href'  => 'https://maps.app.goo.gl/uu7XJcWeC9PmavWR9?g_st=aw',
        ],
        [
            'title' => 'Operational Office:',
            'body'  => 'Jl. Syamsudin Noor (Depan Gerbang Masuk Bandara), Kel. Syamsudin Noor, Kec. Landasan Ulin, Banjarbaru',
            'href'  => 'https://maps.app.goo.gl/oC2wQVriwdwKtyKP8?g_st=aw',
        ],
    ];

    $sosmed = [
        ['icon' => 'icon_facebook.png',  'href' => '#',                                                       'label' => 'Facebook'],
        ['icon' => 'icon_whatsapp.png',  'href' => 'https://wa.me/628115017265',                              'label' => 'WhatsApp'],
        ['icon' => 'icon_linkedin.png',  'href' => 'https://www.linkedin.com/in/rory-negara-622212230/',      'label' => 'LinkedIn'],
        ['icon' => 'icon_instagram.png', 'href' => 'https://www.instagram.com/negarajayalogistik/',           'label' => 'Instagram'],
    ];
@endphp

<footer class="relative isolate bg-navy text-slate-300">
    {{-- Background peta dunia --}}
    <img src="{{ asset('bg_world_white.png') }}" alt=""
         class="absolute inset-0 -z-10 h-full w-full object-cover">

    <div class="px-6 py-14 sm:px-10 lg:px-16 lg:py-16 xl:px-24">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-12 lg:gap-8">

            {{-- 1. Logo + tagline --}}
            <div class="lg:col-span-3">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('icon_sosmed_footer_njl/logo_njl_footer.png') }}"
                         alt="Logo Negara Jaya Logistik" class="h-12 w-auto shrink-0">
                    <div class="leading-tight">
                        <p class="text-base font-extrabold uppercase tracking-tight text-white">
                            CV. Negara Jaya Logistik
                        </p>
                        <p class="text-[10px] font-semibold uppercase tracking-[0.25em] text-white">
                            Global Delivery Partner
                        </p>
                    </div>
                </div>
                <p class="mt-5 max-w-xs text-sm leading-relaxed text-slate-300">
                    Mitra logistik terpercaya yang siap mendukung kelancaran bisnis Anda
                    dengan layanan terbaik.
                </p>
            </div>

            {{-- 2. Layanan --}}
            <div class="lg:col-span-2">
                <h4 class="text-base font-bold uppercase tracking-wide text-white">Layanan</h4>
                <ul class="mt-4 space-y-1.5 text-sm">
                    @foreach ($layanan as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            {{-- 3. Informasi --}}
            <div class="lg:col-span-2">
                <h4 class="text-base font-bold uppercase tracking-wide text-white">Informasi</h4>
                <ul class="mt-4 space-y-1.5 text-sm">
                    @foreach ($informasi as $item)
                        <li>
                            <a href="{{ $item['href'] }}" class="transition hover:text-accent">{{ $item['label'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- 4. Kontak Kami --}}
            <div id="kontak" class="scroll-mt-24 lg:col-span-2">
                <h4 class="text-base font-bold uppercase tracking-wide text-white">Kontak Kami</h4>
                <ul class="mt-4 space-y-2 text-sm">
                    @foreach ($kontak as $item)
                        <li>
                            <a href="{{ $item['href'] }}" class="inline-flex items-center gap-2 underline-offset-2 transition hover:text-accent hover:underline">
                                @if ($item['type'] === 'phone')
                                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                    </svg>
                                @else
                                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                @endif
                                <span>{{ $item['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- 5. Alamat Kami --}}
            <div class="lg:col-span-3">
                <h4 class="text-base font-bold uppercase tracking-wide text-white">Alamat Kami</h4>
                <ul class="mt-4 space-y-4 text-sm">
                    @foreach ($alamat as $a)
                        <li>
                            <a href="{{ $a['href'] }}" target="_blank" rel="noopener noreferrer"
                               class="flex gap-2 transition hover:text-accent">
                                <svg class="mt-0.5 h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <span>
                                    <strong class="block font-bold text-white">{{ $a['title'] }}</strong>
                                    {{ $a['body'] }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- Bottom bar --}}
    <div class="border-t border-white/15">
        <div class="flex flex-col items-center justify-between gap-4 px-6 py-5 sm:px-10 md:flex-row lg:px-16 xl:px-24">
            <p class="text-sm font-bold text-white">
                {{ date('Y') }} Negara Jaya Logistik All Right Reserved.
            </p>

            <div class="flex items-center gap-3">
                @foreach ($sosmed as $s)
                    <a href="{{ $s['href'] }}" aria-label="{{ $s['label'] }}"
                       target="_blank" rel="noopener noreferrer"
                       class="block transition hover:-translate-y-0.5">
                        <img src="{{ asset('icon_sosmed_footer_njl/' . $s['icon']) }}"
                             alt="{{ $s['label'] }}" class="h-9 w-9">
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>

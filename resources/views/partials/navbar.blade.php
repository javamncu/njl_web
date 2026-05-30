@php
    $navLinks = [
        ['label' => 'Beranda', 'href' => '#beranda'],
        ['label' => 'Layanan', 'href' => '#layanan'],
        ['label' => 'Galeri', 'href' => '#galeri'],
        ['label' => 'Tentang Kami', 'href' => '#tentang'],
        ['label' => 'Kontak', 'href' => '#kontak'],
    ];
@endphp

<header id="navbar" class="sticky top-0 z-50 bg-white shadow-sm">
    <nav class="mx-auto flex max-w-7xl items-center gap-4 px-4 py-4 sm:px-6 lg:px-8">

        {{-- Logo: emblem + nama perusahaan --}}
        <a href="#beranda" class="flex items-center gap-3">
            <img src="{{ asset('logo_njl.png') }}" alt="Logo Negara Jaya Logistik"
                 class="h-10 w-auto shrink-0 sm:h-12">
            <span class="leading-tight">
                <span class="block text-sm font-extrabold uppercase tracking-tight text-navy sm:text-base lg:text-xl">
                    CV. Negara Jaya Logistik
                </span>
                <span class="block text-[9px] font-semibold uppercase tracking-[0.25em] text-navy sm:text-[11px]">
                    Global Delivery Partner
                </span>
            </span>
        </a>

        {{-- Menu desktop (di tengah) --}}
        <div class="hidden flex-1 items-center justify-center gap-7 lg:flex xl:gap-9">
            @foreach ($navLinks as $link)
                <a href="{{ $link['href'] }}"
                   class="text-sm font-bold uppercase tracking-wide text-navy transition-colors hover:text-brand">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>

        {{-- Tombol CTA --}}
        <a href="#kontak"
           class="hidden rounded-lg bg-navy px-6 py-2.5 text-sm font-semibold uppercase tracking-wide text-white shadow-sm transition hover:bg-navy-light lg:inline-flex">
            Hubungi Kami
        </a>

        {{-- Tombol menu mobile --}}
        <button id="menu-toggle" type="button"
                class="ml-auto inline-flex items-center justify-center rounded-md p-2 text-navy lg:hidden"
                aria-label="Buka menu" aria-expanded="false">
            <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </nav>

    {{-- Menu mobile --}}
    <div id="mobile-menu" class="hidden border-t border-slate-100 bg-white lg:hidden">
        <div class="space-y-1 px-4 py-3">
            @foreach ($navLinks as $link)
                <a href="{{ $link['href'] }}"
                   class="block rounded-md px-3 py-2 text-sm font-bold uppercase tracking-wide text-navy hover:bg-slate-50 hover:text-brand">
                    {{ $link['label'] }}
                </a>
            @endforeach
            <a href="#kontak"
               class="mt-2 block rounded-lg bg-navy px-3 py-2.5 text-center text-sm font-semibold uppercase tracking-wide text-white">
                Hubungi Kami
            </a>
        </div>
    </div>
</header>

<script>
    (function () {
        const toggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('mobile-menu');
        toggle.addEventListener('click', function () {
            const open = menu.classList.toggle('hidden') === false;
            toggle.setAttribute('aria-expanded', open);
        });
        menu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                menu.classList.add('hidden');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });
    })();
</script>

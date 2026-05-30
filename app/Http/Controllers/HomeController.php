<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman Beranda.
     */
    public function index()
    {
        // Mapping layanan -> folder foto. Urutan ikon di Layanan Kami
        // sama dengan urutan array ini (1..12 = foto-1..foto-12).
        $services = [
            ['name' => 'Shipping Cont (Domestic & International)', 'icon' => 'shipping-cont.png',   'folder' => 'foto-1'],
            ['name' => 'Project Handling',                         'icon' => 'project.png',         'folder' => 'foto-2'],
            ['name' => 'Freight Forwarding',                       'icon' => 'freight.png',         'folder' => 'foto-3'],
            ['name' => 'Trucking / Dorring',                       'icon' => 'trucking.png',        'folder' => 'foto-4'],
            ['name' => 'Custom Ex-Im (ppjk)',                      'icon' => 'custom-exim.png',     'folder' => 'foto-5'],
            ['name' => 'Tanker',                                   'icon' => 'tanker.png',          'folder' => 'foto-6'],
            ['name' => 'Rent Heavy Lift Equipment',                'icon' => 'rent-heavy-lift.png', 'folder' => 'foto-7'],
            ['name' => 'Warehousing',                              'icon' => 'warehousing.png',     'folder' => 'foto-8'],
            ['name' => 'Barge',                                    'icon' => 'barge.png',           'folder' => 'foto-9'],
            ['name' => 'LCT',                                      'icon' => 'lct.png',             'folder' => 'foto-10'],
            ['name' => 'MV',                                       'icon' => 'mv.png',              'folder' => 'foto-11'],
            ['name' => 'Stevedoring',                              'icon' => 'stevedoring.png',     'folder' => 'foto-12'],
        ];

        // Isi 'photos' otomatis dari isi folder public/foto_layanan_kami/<folder>.
        foreach ($services as $idx => $service) {
            $files = glob(public_path("foto_layanan_kami/{$service['folder']}/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}"), GLOB_BRACE) ?: [];
            sort($files);
            $services[$idx]['photos'] = array_map(
                fn ($f) => asset("foto_layanan_kami/{$service['folder']}/" . rawurlencode(basename($f))),
                $files
            );
        }

        // Foto galeri (1.jpeg ... 34.jpeg di public/galeri_kami).
        $galeri = collect(range(1, 34))
            ->map(fn ($i) => "{$i}.jpeg")
            ->all();

        // Alasan memilih NJL — ikon di public/icon_njl_kenapa_memilih_kami.
        $features = [
            ['icon' => 'icon_1.png', 'label' => 'Pengiriman Tepat Waktu'],
            ['icon' => 'icon_2.png', 'label' => 'Profesional & Berpengalaman'],
            ['icon' => 'icon_3.png', 'label' => 'Harga Kompetitif'],
            ['icon' => 'icon_4.png', 'label' => 'Jaringan Luas'],
            ['icon' => 'icon_5.png', 'label' => 'Pelayanan Responsif'],
        ];

        return view('home', compact('services', 'galeri', 'features'));
    }
}

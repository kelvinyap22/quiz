<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Informasi;
use Illuminate\Database\Seeder;

class KnowledgeSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Kategori Dummy
        $kategori1 = Kategori::create(['nama' => 'Teknologi']);
        $kategori2 = Kategori::create(['nama' => 'Manajemen']);

        // Buat Informasi Dummy
        Informasi::create([
            'kategori_id' => $kategori1->id,
            'judul' => 'Pengenalan Laravel 12 Framework',
            'ringkasan' => 'Panduan singkat mengenai fitur-fitur baru di Laravel 12.',
            'isi' => 'Laravel 12 membawa peningkatan performa dan kemudahan struktur file...',
            'sumber' => 'laravel.com',
            'status' => 'published',
        ]);

        Informasi::create([
            'kategori_id' => $kategori2->id,
            'judul' => 'Prinsip Knowledge Management System',
            'ringkasan' => 'Konsep dasar penyimpanan pengetahuan dalam organisasi.',
            'isi' => 'KMS berguna untuk mengorganisir pengetahuan implisit dan eksplisit...',
            'sumber' => 'Buku KMS Ubaya',
            'status' => 'draft',
        ]);
    }
}
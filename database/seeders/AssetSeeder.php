<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $samples = [
            [
                'kode_barang' => 'AST-AC-01',
                'nama_barang' => 'AC Split 1/2 PK',
                'kategori' => 'Elektronik',
                'merek' => 'Daikin',
                'kondisi_fisik' => 'baik',
                'lokasi_penempatan' => 'Kamar 101',
                'jumlah' => 1,
                'tanggal_pembelian' => '2024-01-15',
                'catatan' => 'Unit baru, remote berfungsi normal.',
            ],
            [
                'kode_barang' => 'AST-KSR-01',
                'nama_barang' => 'Kasur Springbed Single',
                'kategori' => 'Perlengkapan Kamar',
                'merek' => 'Comforta',
                'kondisi_fisik' => 'baik',
                'lokasi_penempatan' => 'Kamar 101',
                'jumlah' => 1,
                'tanggal_pembelian' => '2024-01-15',
                'catatan' => 'Dilengkapi sprei pelindung anti air.',
            ],
            [
                'kode_barang' => 'AST-LMR-01',
                'nama_barang' => 'Lemari Pakaian 2 Pintu',
                'kategori' => 'Furniture',
                'merek' => 'Olympic',
                'kondisi_fisik' => 'baik',
                'lokasi_penempatan' => 'Kamar 101',
                'jumlah' => 1,
                'tanggal_pembelian' => '2024-01-15',
                'catatan' => 'Bahan partikel board finishing kayu ek.',
            ],
            [
                'kode_barang' => 'AST-TV-01',
                'nama_barang' => 'Smart TV 32 Inch',
                'kategori' => 'Elektronik',
                'merek' => 'Sharp',
                'kondisi_fisik' => 'baik',
                'lokasi_penempatan' => 'Ruang Santai Bersama',
                'jumlah' => 1,
                'tanggal_pembelian' => '2024-03-10',
                'catatan' => 'Terhubung ke WiFi umum kos.',
            ],
            [
                'kode_barang' => 'AST-AC-02',
                'nama_barang' => 'AC Split 1 PK',
                'kategori' => 'Elektronik',
                'merek' => 'LG',
                'kondisi_fisik' => 'rusak_ringan',
                'lokasi_penempatan' => 'Kamar 202',
                'jumlah' => 1,
                'tanggal_pembelian' => '2023-08-20',
                'catatan' => 'Kurang dingin, perlu jadwal cuci dan tambah freon.',
            ],
            [
                'kode_barang' => 'AST-KLK-01',
                'nama_barang' => 'Kulkas 1 Pintu',
                'kategori' => 'Elektronik',
                'merek' => 'Polytron',
                'kondisi_fisik' => 'baik',
                'lokasi_penempatan' => 'Dapur Bersama',
                'jumlah' => 1,
                'tanggal_pembelian' => '2023-11-05',
                'catatan' => 'Bisa digunakan seluruh penghuni kos.',
            ],
        ];

        foreach ($samples as $sample) {
            Asset::updateOrCreate(
                ['kode_barang' => $sample['kode_barang']],
                $sample
            );
        }
    }
}

<?php

namespace App\Models;

use Database\Factories\AssetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    /** @use HasFactory<AssetFactory> */
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'merek',
        'kondisi_fisik',
        'lokasi_penempatan',
        'jumlah',
        'tanggal_pembelian',
        'catatan',
    ];

    protected $casts = [
        'tanggal_pembelian' => 'date',
        'jumlah' => 'integer',
    ];
}

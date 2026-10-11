<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AssetController extends Controller
{
    private function rules(?int $id = null): array
    {
        return [
            'kode_barang' => ['nullable', 'string', 'max:50', Rule::unique('assets', 'kode_barang')->ignore($id)],
            'nama_barang' => ['required', 'string', 'max:100'],
            'kategori' => ['required', 'string', 'max:50'],
            'merek' => ['required', 'string', 'max:100'],
            'kondisi_fisik' => ['required', 'in:baik,rusak_ringan,rusak_berat'],
            'lokasi_penempatan' => ['required', 'string', 'max:100'],
            'jumlah' => ['required', 'integer', 'min:1'],
            'tanggal_pembelian' => ['nullable', 'date'],
            'catatan' => ['nullable', 'string'],
        ];
    }

    public function index(Request $request)
    {
        $assets = Asset::query()
            ->when($request->search, function ($q, $search) {
                $q->where(function ($query) use ($search) {
                    $query->where('nama_barang', 'like', "%{$search}%")
                        ->orWhere('kode_barang', 'like', "%{$search}%")
                        ->orWhere('merek', 'like', "%{$search}%")
                        ->orWhere('lokasi_penempatan', 'like', "%{$search}%");
                });
            })
            ->when($request->kondisi, function ($q, $kondisi) {
                $q->where('kondisi_fisik', $kondisi);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('assets.index', compact('assets'));
    }

    public function create()
    {
        return view('assets.create');
    }

    public function store(Request $request)
    {
        Asset::create($request->validate($this->rules()));

        return redirect()->route('assets.index')
            ->with('success', 'Data aset inventaris berhasil ditambahkan.');
    }

    public function edit(Asset $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    public function update(Request $request, Asset $asset)
    {
        $asset->update($request->validate($this->rules($asset->id)));

        return redirect()->route('assets.index')
            ->with('success', 'Data aset inventaris berhasil diubah.');
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect()->route('assets.index')
            ->with('success', 'Data aset inventaris berhasil dihapus.');
    }
}

@extends('layouts.app')
@section('title', 'Data Inventaris Aset Kos')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
    <div>
        <h4 class="mb-0 fw-bold">Modul D: Inventaris Aset Kos</h4>
        <small class="text-muted">Master data barang inventaris, merek, dan kondisi fisik kamar/properti kos</small>
    </div>
    <a href="{{ route('assets.create') }}" class="btn btn-primary">
        + Tambah Aset Baru
    </a>
</div>

{{-- Filter & Pencarian --}}
<div class="card mb-3 shadow-sm border-0">
    <div class="card-body">
        <form method="GET" action="{{ route('assets.index') }}" class="row g-2 align-items-center">
            <div class="col-md-7">
                <input type="text" name="search" value="{{ request('search') }}"
                       class="form-control" placeholder="Cari nama barang, kode, merek, atau lokasi penempatan...">
            </div>
            <div class="col-md-3">
                <select name="kondisi" class="form-select">
                    <option value="">-- Semua Kondisi Fisik --</option>
                    <option value="baik" @selected(request('kondisi') === 'baik')>Kondisi: Baik</option>
                    <option value="rusak_ringan" @selected(request('kondisi') === 'rusak_ringan')>Kondisi: Rusak Ringan</option>
                    <option value="rusak_berat" @selected(request('kondisi') === 'rusak_berat')>Kondisi: Rusak Berat</option>
                </select>
            </div>
            <div class="col-md-2 d-flex gap-1">
                <button type="submit" class="btn btn-dark w-100">Cari</button>
                @if(request('search') || request('kondisi'))
                    <a href="{{ route('assets.index') }}" class="btn btn-outline-secondary">Reset</a>
                @endif
            </div>
        </form>
    </div>
</div>

{{-- Tabel Data --}}
<div class="card shadow-sm border-0">
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th class="text-center" style="width: 50px;">No</th>
                    <th>Kode</th>
                    <th>Nama Barang & Kategori</th>
                    <th>Merek</th>
                    <th>Kondisi Fisik</th>
                    <th>Lokasi</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center" style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($assets as $asset)
                    <tr>
                        <td class="text-center">{{ $assets->firstItem() + $loop->index }}</td>
                        <td>
                            <span class="badge bg-light text-dark border font-monospace">
                                {{ $asset->kode_barang ?? '-' }}
                            </span>
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $asset->nama_barang }}</div>
                            <small class="badge bg-secondary-subtle text-secondary border">
                                {{ $asset->kategori }}
                            </small>
                            @if ($asset->catatan)
                                <div class="text-muted small text-truncate" style="max-width: 250px;" title="{{ $asset->catatan }}">
                                    <em>{{ $asset->catatan }}</em>
                                </div>
                            @endif
                        </td>
                        <td>{{ $asset->merek }}</td>
                        <td>
                            @if ($asset->kondisi_fisik === 'baik')
                                <span class="badge bg-success">Baik</span>
                            @elseif ($asset->kondisi_fisik === 'rusak_ringan')
                                <span class="badge bg-warning text-dark">Rusak Ringan</span>
                            @else
                                <span class="badge bg-danger">Rusak Berat</span>
                            @endif
                        </td>
                        <td>
                            <span class="text-body fw-medium">{{ $asset->lokasi_penempatan }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-info-subtle text-info-emphasis border px-2 py-1">
                                {{ $asset->jumlah }} Unit
                            </span>
                        </td>
                        <td class="text-center text-nowrap">
                            <a href="{{ route('assets.edit', $asset) }}" class="btn btn-sm btn-outline-warning">
                                Edit
                            </a>
                            <form action="{{ route('assets.destroy', $asset) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus aset \'{{ $asset->nama_barang }}\'?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-5">
                            <p class="mb-1 fw-semibold">Belum ada data aset inventaris ditemukan.</p>
                            <small>Klik tombol <strong>+ Tambah Aset Baru</strong> untuk menambahkan barang inventaris.</small>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $assets->links() }}
</div>
@endsection

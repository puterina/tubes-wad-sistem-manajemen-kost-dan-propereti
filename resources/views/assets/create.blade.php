@extends('layouts.app')
@section('title', 'Tambah Aset Inventaris')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 fw-bold">Tambah Aset Inventaris Baru</h5>
                        <small class="text-muted">Isi formulir untuk mencatat barang inventaris fasilitas kos/kamar</small>
                    </div>
                    <a href="{{ route('assets.index') }}" class="btn btn-outline-secondary btn-sm">
                        &larr; Kembali
                    </a>
                </div>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('assets.store') }}" method="POST">
                    @csrf
                    @include('assets._form')

                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                        <a href="{{ route('assets.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Data Aset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

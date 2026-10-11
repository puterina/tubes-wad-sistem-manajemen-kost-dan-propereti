@extends('layouts.app')
@section('title', 'Edit Aset Inventaris')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 fw-bold">Edit Aset Inventaris: {{ $asset->nama_barang }}</h5>
                        <small class="text-muted">Perbarui informasi barang, merek, atau kondisi fisik aset</small>
                    </div>
                    <a href="{{ route('assets.index') }}" class="btn btn-outline-secondary btn-sm">
                        &larr; Kembali
                    </a>
                </div>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('assets.update', $asset) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('assets._form')

                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                        <a href="{{ route('assets.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning px-4">Perbarui Data Aset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@php $a = $asset ?? null; @endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Kode Barang <small class="text-muted">(Opsional / Otomatis Unik)</small></label>
        <input type="text" name="kode_barang" value="{{ old('kode_barang', $a->kode_barang ?? '') }}"
               class="form-control @error('kode_barang') is-invalid @enderror" placeholder="Contoh: AST-AC-01">
        @error('kode_barang') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Nama Barang <span class="text-danger">*</span></label>
        <input type="text" name="nama_barang" value="{{ old('nama_barang', $a->nama_barang ?? '') }}"
               class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Contoh: AC Split 1/2 PK, Lemari 2 Pintu">
        @error('nama_barang') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
            <option value="">-- Pilih Kategori --</option>
            @php
                $kategoriList = ['Elektronik', 'Furniture', 'Perlengkapan Kamar', 'Sanitari', 'Lainnya'];
            @endphp
            @foreach ($kategoriList as $kat)
                <option value="{{ $kat }}" @selected(old('kategori', $a->kategori ?? '') === $kat)>{{ $kat }}</option>
            @endforeach
        </select>
        @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Merek <span class="text-danger">*</span></label>
        <input type="text" name="merek" value="{{ old('merek', $a->merek ?? '') }}"
               class="form-control @error('merek') is-invalid @enderror" placeholder="Contoh: Daikin, Sharp, Olympic, LG">
        @error('merek') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Kondisi Fisik <span class="text-danger">*</span></label>
        <select name="kondisi_fisik" class="form-select @error('kondisi_fisik') is-invalid @enderror">
            <option value="baik" @selected(old('kondisi_fisik', $a->kondisi_fisik ?? 'baik') === 'baik')>Baik</option>
            <option value="rusak_ringan" @selected(old('kondisi_fisik', $a->kondisi_fisik ?? '') === 'rusak_ringan')>Rusak Ringan</option>
            <option value="rusak_berat" @selected(old('kondisi_fisik', $a->kondisi_fisik ?? '') === 'rusak_berat')>Rusak Berat</option>
        </select>
        @error('kondisi_fisik') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-5 mb-3">
        <label class="form-label fw-semibold">Lokasi Penempatan <span class="text-danger">*</span></label>
        <input type="text" name="lokasi_penempatan" value="{{ old('lokasi_penempatan', $a->lokasi_penempatan ?? '') }}"
               class="form-control @error('lokasi_penempatan') is-invalid @enderror" placeholder="Contoh: Kamar 101, Ruang Santai, Dapur">
        @error('lokasi_penempatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label fw-semibold">Jumlah (Unit) <span class="text-danger">*</span></label>
        <input type="number" name="jumlah" min="1" value="{{ old('jumlah', $a->jumlah ?? 1) }}"
               class="form-control @error('jumlah') is-invalid @enderror">
        @error('jumlah') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Tanggal Pembelian / Pengadaan</label>
    <input type="date" name="tanggal_pembelian"
           value="{{ old('tanggal_pembelian', isset($a->tanggal_pembelian) ? $a->tanggal_pembelian->format('Y-m-d') : '') }}"
           class="form-control @error('tanggal_pembelian') is-invalid @enderror">
    @error('tanggal_pembelian') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Catatan / Keterangan Fisik</label>
    <textarea name="catatan" rows="3"
              class="form-control @error('catatan') is-invalid @enderror"
              placeholder="Spesifikasi tambahan, kelengkapan, riwayat servis...">{{ old('catatan', $a->catatan ?? '') }}</textarea>
    @error('catatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

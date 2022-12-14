@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">TAMBAH OBAT</h3>
                    <form action="/admin/obat/store" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_obat" class="form-label">NAMA OBAT</label>
                            <input type="text" name="nama_obat"
                                class="form-control @error('nama_obat')
                                is-invalid
                            @enderror"
                                id="nama_obat" value="{{ old('nama_obat') }}">
                            <div class="invalid-feedback">
                                Nama Obat Sudah Ada / Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ket_obat" class="form-label">KETERANGAN OBAT</label>
                            <textarea class="form-control @error('ket_obat')
                            is-invalid
                        @enderror" name="ket_obat"
                                rows="10">{{ old('ket_obat') }}</textarea>
                            <div class="invalid-feedback">
                                Keterangan Obat Tidak Boleh Kosong
                            </div>
                        </div>
                        <input class="btn btn-success" type="submit" value="Simpan">
                        <a href="/admin/obat/index" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

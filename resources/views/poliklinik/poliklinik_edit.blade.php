@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">EDIT DATA POLIKLINIK</h3>
                    <form action="/admin/poliklinik/{{ $poliklinik->id }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="nama_poli" class="form-label">NAMA POLIKLINIK</label>
                            <input type="text" name="nama_poli"
                                class="form-control @error('nama_poli')
                                is-invalid
                            @enderror"
                                id="nama_poli" value="{{ $poliklinik->nama_poli }}">
                            <div class="invalid-feedback">
                                Nama Poliklinik Sudah Ada / Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">LOKASI</label>
                            <input type="text" name="lokasi"
                                class="form-control @error('lokasi')
                                is-invalid
                            @enderror"
                                id="lokasi" value="{{ $poliklinik->lokasi }}">
                            <div class="invalid-feedback">
                                Lokasi Sudah Ada / Tidak Boleh Kosong
                            </div>
                        </div>
                        <input class="btn btn-success" type="submit" value="Simpan">
                        <a href="/admin/poliklinik/index" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



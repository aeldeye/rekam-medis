@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">EDIT DATA PASIEN</h3>
                    <form action="/admin/pasien/{{ $pasien->id }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="nomor_identitas" class="form-label">NO IDENTITAS</label>
                            <input type="number" name="nomor_identitas"
                                class="form-control @error('nomor_identitas')
                                is-invalid
                            @enderror"
                                id="nomor_identitas" value="{{ $pasien->nomor_identitas }}">
                            <div class="invalid-feedback">
                                No Identitas Sudah Ada / Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_pasien" class="form-label">NAMA PASIEN</label>
                            <input type="text" name="nama_pasien"
                                class="form-control @error('nama_pasien')
                            is-invalid
                        @enderror"
                                id="nama_pasien" value="{{ $pasien->nama_pasien }}">
                            <div class="invalid-feedback">
                                Nama Pasien Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="mb-3">
                            <select
                                class="form-select @error('jenis_kelamin')
                            is-invalid
                        @enderror"
                                name="jenis_kelamin" id="">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <div class="invalid-feedback">
                                Silahkan Pilih Jenis Kelamin
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">ALAMAT</label>
                            <textarea class="form-control @error('alamat')
                            is-invalid
                        @enderror"
                                name="alamat" rows="10">{{ $pasien->alamat }}</textarea>
                            <div class="invalid-feedback">
                                Alamat Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">NO TELEPON</label>
                            <input type="number" name="no_telp"
                                class="form-control @error('no_telp')
                            is-invalid
                        @enderror"
                                id="no_telp" value="{{ $pasien->no_telp }}">
                            <div class="invalid-feedback">
                                No Telepon Sudah Ada / Tidak Boleh Kosong
                            </div>
                        </div>
                        <input class="btn btn-success" type="submit" value="Simpan">
                        <a href="/admin/pasien/index" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

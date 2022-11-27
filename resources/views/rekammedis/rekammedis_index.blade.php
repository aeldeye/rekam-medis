@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">REKAM MEDIS</h3>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            @if (auth()->user()->level == 1)
                                <a class="btn btn-primary" href="/admin/rekammedis/create">TAMBAH</a>
                            @elseif(auth()->user()->level == 2)
                                <a class="btn btn-primary" href="/user/rekammedis/create">TAMBAH</a>
                            @endif
                            <br><br>
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">TANGGAL PERIKSA</th>
                                    <th class="text-center">POLIKLINIK</th>
                                    <th class="text-center">NAMA PASIEN</th>
                                    <th class="text-center">KELUHAN</th>
                                    <th class="text-center">DOKTER</th>
                                    <th class="text-center">DIAGNOSA</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                            @foreach ($rekammedis as $rm)
                                <tr>
                                    <td class="text-center" scope="row">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $rm->tgl_periksa }}</td>
                                    <td class="text-center">{{ $rm->poliklinik->nama_poli }}</td>
                                    <td class="text-center">{{ $rm->pasien->nama_pasien }}</td>
                                    <td class="text-center">{{ $rm->keluhan }}</td>
                                    <td class="text-center">{{ $rm->dokter->nama_dokter }}</td>
                                    <td class="text-center">{{ $rm->diagnosa }}</td>
                                    <td class="text-center">
                                        @if (auth()->user()->level == 1)
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="/admin/rekammedis/{{ $rm->id }}/edit"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="/admin/rekammedis/{{ $rm->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input class="btn btn-danger" type="submit" value="Delete"
                                                        onclick="return confirm('Anda yakin?')">
                                                </form>
                                            </div>
                                        @elseif(auth()->user()->level == 2)
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="/user/rekammedis/{{ $rm->id }}/edit"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="/user/rekammedis/{{ $rm->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input class="btn btn-danger" type="submit" value="Delete"
                                                        onclick="return confirm('Anda yakin?')">
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

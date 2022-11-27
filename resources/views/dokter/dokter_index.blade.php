@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">DATA DOKTER</h3>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <a class="btn btn-primary" href="/admin/dokter/create">TAMBAH</a>
                            <br><br>
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">NAMA DOKTER</th>
                                    <th class="text-center">SPESIALIS</th>
                                    <th class="text-center">ALAMAT</th>
                                    <th class="text-center">NO TELEPON</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                            @foreach ($dokter as $dktr)
                                <tr>
                                    <td class="text-center" scope="row">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $dktr->nama_dokter }}</td>
                                    <td class="text-center">{{ $dktr->spesialis }}</td>
                                    <td class="text-center">{{ $dktr->alamat }}</td>
                                    <td class="text-center">{{ $dktr->no_telp }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/admin/dokter/{{ $dktr->id }}/edit"
                                                class="btn btn-warning">Edit</a>
                                            <form action="/admin/dokter/{{ $dktr->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input class="btn btn-danger" type="submit" value="Delete"
                                                    onclick="return confirm('Anda yakin?')">
                                            </form>
                                        </div>
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

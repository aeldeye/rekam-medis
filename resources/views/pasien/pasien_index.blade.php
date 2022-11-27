@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">DATA PASIEN</h3>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <a class="btn btn-primary" href="/admin/pasien/create">TAMBAH</a>
                            <br><br>
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">NO IDENTITAS</th>
                                    <th class="text-center">NAMA</th>
                                    <th class="text-center">JENIS KELAMIN</th>
                                    <th class="text-center">ALAMAT</th>
                                    <th class="text-center">NO TELEPON</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                            @foreach ($pasien as $psn)
                                <tr>
                                    <td class="text-center" scope="row">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $psn->nomor_identitas }}</td>
                                    <td class="text-center">{{ $psn->nama_pasien }}</td>
                                    <td class="text-center">{{ $psn->jenis_kelamin }}</td>
                                    <td class="text-center">{{ $psn->alamat }}</td>
                                    <td class="text-center">{{ $psn->no_telp }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/admin/pasien/{{ $psn->id }}/edit"
                                                class="btn btn-warning">Edit</a>
                                            <form action="/admin/pasien/{{ $psn->id }}" method="POST">
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

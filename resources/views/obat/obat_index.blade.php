@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">DATA OBAT</h3>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <a class="btn btn-primary" href="/admin/obat/create">TAMBAH</a>
                            <br><br>
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">NAMA OBAT</th>
                                    <th class="text-center">KETERANGAN OBAT</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                            @foreach ($obat as $obt)
                                <tr>
                                    <td class="text-center" scope="row">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $obt->nama_obat }}</td>
                                    <td class="text-center">{{ $obt->ket_obat }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/admin/obat/{{ $obt->id }}/edit" class="btn btn-warning">Edit</a>
                                            <form action="/admin/obat/{{ $obt->id }}" method="POST">
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

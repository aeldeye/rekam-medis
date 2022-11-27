@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">DATA POLIKLINIK</h3>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <a class="btn btn-primary" href="/admin/poliklinik/create">TAMBAH</a>
                            <br><br>
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">NAMA POLIKLINIK</th>
                                    <th class="text-center">LOKASI</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                            @foreach ($poliklinik as $poli)
                                <tr>
                                    <td class="text-center" scope="row">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $poli->nama_poli }}</td>
                                    <td class="text-center">{{ $poli->lokasi }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/admin/poliklinik/{{ $poli->id }}/edit"
                                                class="btn btn-warning">Edit</a>
                                            <form action="/admin/poliklinik/{{ $poli->id }}" method="POST">
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

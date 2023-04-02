@extends('layout.main')

@section('title')
    Peminjaman
@endsection

@section('content')
    <h1> Ini halaman Peminjaman</h1>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Kode Rak</th>
                    <th>Nama Rak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoribuku as $kat)
                <tr>
                        <td>{{$kat->id}}</td>
                        <td>{{$kat->rak->code}}</td>
                        <td>{{$kat->rak->name}}</td>
                        <td>{{$kat->code}}</td>
                        <td>{{$kat->name}}</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="#" class="btn btn-primary btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

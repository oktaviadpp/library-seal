@extends('layout.main')

@section('title')
    Peminjaman
@endsection

@section('content')
    <h1> Rak Buku</h1>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Rak</th>
                    <th>Kode Rak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rakbuku as $rak)
                <tr>
                        <td>{{$rak->id}}</td>
                        <td>{{$rak->name}}</td>
                        <td>{{$rak->code}}</td>
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

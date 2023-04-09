@extends('layout.main')

@section('title')
    Daftar Buku
@endsection

@section('content')
    <h1>Daftar Buku</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            {{-- tombol tambah --}}
            <a href="{{ route('buku.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Buku</span>
            </a>

            {{-- tombol Delete All --}}
            <form action="{{route('delete-all')}}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-icon-split" onclick="return confirm('Anda yakin ingin hapus SEMUA DATA?')">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Hapus Semua Data</span>
                </button>
            </form>

            {{-- alert sukses --}}
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="myTables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kategori</th>
                            <th>Kode Rak</th>
                            <th>Judul Buku</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $key => $buku)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$buku->kategori->code}}</td>
                            <td>{{$buku->rak->code}}</td>
                            <td>{{mb_strimwidth($buku->title, 0, 55, '...');}}</td>
                            <td>
                                {{-- tombol hapus --}}
                                <form action="{{route('buku.destroy',$buku->id)}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Anda yakin ingin hapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                {{-- tombol edit --}}
                                <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                {{-- tombol detail --}}
                                <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                        </tr>

                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

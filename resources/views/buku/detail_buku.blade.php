@extends('layout.main')

@section('title')
    Peminjaman
@endsection

@section('content')
    <h1>Detail Buku</h1>
    <div class="card">
        <div class="card-header">
          Kategori Buku : {{$buku->kategori->name}}<br>
          Rak Buku : {{$buku->rak->code}}
        </div>
        <div class="card-body">
          <h5 class="card-title">{{$buku->title}}</h5>
          <img width="300px" src="{{ url('/storage/buku/'.$buku->image) }}">
          <p class="card-text">Pengarang : {{$buku->pengarang}}</p>
          <p class="card-text">Penerbit : {{$buku->penerbit}}</p>
          <p class="card-text">Tahun Terbit : {{$buku->tahun_terbit}}</p>
          <a href="/buku" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection

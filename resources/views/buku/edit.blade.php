@extends('layout.main')

@section('title')
    Buku | Edit Buku
@endsection

@section('content')
    <h1> Edit Buku </h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('buku.update', $buku->id)}}" method="POST">
                @method("PUT")
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Kode Kategori</label>

                  {{-- dropdown kategori --}}
                  <div class="dropdown">
                    <div class="btn-group">
                        <select  id="kategori-dropdown" class="form-control" name="id_kategori">
                            <option selected disabled value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $key => $data)
                            <option value="{{$data->id}}">
                                {{$data->code}} - {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                      </div>
                  </div>

                  <label for="exampleInputEmail1" class="form-label">Kode Rak</label>
                  {{-- dropdown rak --}}
                  <div class="dropdown">
                    <div class="btn-group">
                        <select  id="rak-dropdown" class="form-control" name="id_rak">
                            <option value="">-- Pilih Rak --</option>
                            @foreach ($rak as $data)
                            <option value="{{$data->id}}">
                                {{$data->code}} - {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                      </div>
                  </div>

                  {{-- judul buku --}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul Buku</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$buku->title}}">

                    {{-- PESAN ERROR --}}
                    @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>

                  {{-- Pengarang --}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pengarang</label>
                    <input type="text" class="form-control @error('pengarang') is-invalid @enderror" name="pengarang" value="{{ $buku->pengarang }}">

                    {{-- PESAN ERROR --}}
                    @error('pengarang')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>

                  {{-- penerbit --}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Penerbit</label>
                    <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" value="{{ $buku->penerbit }}">

                    {{-- PESAN ERROR --}}
                    @error('penerbit')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>

                  {{-- Tahun terbit --}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tahun Terbit</label>
                    <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" name="tahun_terbit" value="{{ $buku->tahun_terbit }}">

                    {{-- PESAN ERROR --}}
                    @error('tahun_terbit')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>

                  {{-- desc --}}
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc" value="">{{ $buku->desc }}</textarea>
                  </div>

                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection

@extends('layout.main')

@section('title')
    Buku | Tambah Buku
@endsection

@section('content')
    <h1> Tambah Buku </h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('buku.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Kode Kategori</label>

                  {{-- dropdown kategori --}}
                  <div class="dropdown">
                    <div class="btn-group">
                        <select  id="kategori-dropdown" class="form-control @error('id_kategori') is-invalid @enderror" name="id_kategori">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $data)
                            <option value="{{$data->id}}">
                                {{$data->code}} - {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                      </div>

                      {{-- PESAN ERROR --}}
                    @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>

                  <label for="exampleInputEmail1" class="form-label">Kode Rak</label>
                  {{-- dropdown rak --}}
                  <div class="dropdown">
                    <div class="btn-group">
                        <select  id="rak-dropdown" class="form-control @error('id_rak') is-invalid @enderror" name="id_rak">
                            <option value="">-- Pilih Rak --</option>
                            @foreach ($rak as $data)
                            <option value="{{$data->id}}">
                                {{$data->code}} - {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                      </div>

                      {{-- PESAN ERROR --}}
                    @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>

                  {{-- judul buku --}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul Buku</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">

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
                    <input type="text" class="form-control @error('pengarang') is-invalid @enderror" name="pengarang" value="{{ old('pengarang') }}">

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
                    <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" value="{{ old('penerbit') }}">

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
                    <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" name="tahun_terbit" value="{{ old('tahun_terbit') }}">

                    {{-- PESAN ERROR --}}
                    @error('tahun_terbit')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>

                  {{-- Image --}}
                  <label for="exampleInputEmail1">Image</label>
                  <div class="col-md-12 mb-2">
                    <img id="preview-image-before-upload" src="/storage/no_image_available.png"
                        alt="preview image" style="max-height: 150px;">
                  </div>
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" class="form-control" id="image" name="image">
                    </div>
                  </div>

                  {{-- desc --}}
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc" value="{{ old('desc') }}"></textarea>
                  </div>

                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">

$(document).ready(function (e) {


   $('#image').change(function(){

    let reader = new FileReader();

    reader.onload = (e) => {

      $('#preview-image-before-upload').attr('src', e.target.result);
    }

    reader.readAsDataURL(this.files[0]);

   });

});

</script>


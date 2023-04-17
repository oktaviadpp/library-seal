<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table table-bordered" id="myTables" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Kategori</th>
                <th>Kode Rak</th>
                <th>Judul Buku</th>
                <th>Gambar</th>
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
                    <img width="300px" src="{{ public_path('/storage/buku/'.$buku->image) }}">
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>
</body>
</html>

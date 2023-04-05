<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\BukuModel;
use App\Models\KategoriModel;
use App\Models\RakModel;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = BukuModel::with('rak','kategori')->get();
        return view('buku.buku',[
            'buku'=>$buku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriModel::get();
        $rak = RakModel::get();
        return view('buku.create', compact(['kategori', 'rak']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBukuRequest $request)
    {
        $data=$request->only([
            'id_kategori',
            'id_rak',
            'title',
            'pengarang',
            'penerbit',
            'tahun_terbit',
            'desc',
            'image'
        ]);

        // if ($request->image) {
        //     $file = $request->File('image');
        //     $ext  = $user->username . "." . $file->clientExtension();
        //     $file->storeAs('images/', $ext);
        //     $user->image_name = $ext;
        // }

        // dd($request['image']);
        $newCover = '';
        if($request->file('image')){
            $cover = $request->file('image')->getClientOriginalExtension();
            $newCover = $request->title.'.'.$cover;
            $request->file('image')->storeAs('buku', $newCover);
        }
        $request['image'] = $newCover;
        BukuModel::create($data);
        return redirect()->route('buku.index')->with('success','Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BukuModel  $bukuModel
     * @return \Illuminate\Http\Response
     */
    public function show(BukuModel $buku)
    {
        return view('buku.detail_buku', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BukuModel  $bukuModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BukuModel $buku)
    {
        $kategori = KategoriModel::get();
        $rak = RakModel::get();
        return view('buku.edit', compact(['kategori', 'rak','buku']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BukuModel  $bukuModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBukuRequest $request, BukuModel $buku)
    {
        $data=$request->only([
            'id_kategori',
            'id_rak',
            'title',
            'pengarang',
            'penerbit',
            'tahun_terbit',
            'desc'
        ]);
        $buku->update($data);
        return redirect()->route('buku.index')->with('success','Data Berhasil Disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BukuModel  $bukuModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BukuModel $buku)
    {
        $buku->delete($buku->id);
        return redirect()->route('buku.index')->with('success','Data Berhasil Dihapus!');
    }
}

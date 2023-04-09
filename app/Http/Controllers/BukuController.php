<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\BukuModel;
use App\Models\KategoriModel;
use App\Models\RakModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        // $data=$request->only([
        //     'id_kategori',
        //     'id_rak',
        //     'title',
        //     'pengarang',
        //     'penerbit',
        //     'tahun_terbit',
        //     'desc',
        //     'image'
        // ]);

        $data=$request->all();

		$file = $request->file('image');

		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'storage/buku';
		$file->move($tujuan_upload,$nama_file);
        $data['image'] = $nama_file;

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
        // $data=$request->only([
        //     'id_kategori',
        //     'id_rak',
        //     'title',
        //     'pengarang',
        //     'penerbit',
        //     'tahun_terbit',
        //     'desc'
        // ]);
        $file = $request->file('image');
        $data=$request->all();

        if ($file != '') {
            unlink('storage/buku/'.$buku->image);
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'storage/buku';
            $file->move($tujuan_upload,$nama_file);
            $data['image'] = $nama_file;
            // File::delete($buku->image);
        }
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

    public function deleteAll(){
        BukuModel::truncate();
        return redirect()->route('buku.index')->with('success','Semua Data Berhasil Dihapus!');
    }

}

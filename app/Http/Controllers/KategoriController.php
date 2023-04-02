<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriModel::with('rak')->get();
        return view('kategori_buku',[
            'kategoribuku'=>$kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriModel  $kategoriModel
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriModel $kategoriModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriModel  $kategoriModel
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriModel $kategoriModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriModel  $kategoriModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriModel $kategoriModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriModel  $kategoriModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriModel $kategoriModel)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\Models\RakModel;
use Illuminate\Http\Request;

class RakControllerResourceModel extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rak = RakModel::get();
        // $kategori = KategoriModel::get();

        // $rak = RakModel::with('kategori')->get();
        // dd($rak);

        return view('rak_buku',[
            'rakbuku'=>$rak
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
     * @param  \App\Models\RakModel  $rakModel
     * @return \Illuminate\Http\Response
     */
    public function show(RakModel $rakModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RakModel  $rakModel
     * @return \Illuminate\Http\Response
     */
    public function edit(RakModel $rakModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RakModel  $rakModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RakModel $rakModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RakModel  $rakModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RakModel $rakModel)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(){
		$gambar = Upload::get();
		return view('upload',['gambar' => $gambar]);
	}

	public function proses_upload(Request $request){
		// $this->validate($request, [
		// 	'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		// 	'keterangan' => 'required',
		// ]);
        $data=$request->all();

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
        $data['file'] = $nama_file;
        Upload::create($data);
		// Upload::create([
		// 	'file' => $nama_file,
		// 	'keterangan' => $request->keterangan,
		// ]);

		return redirect()->back();
	}
}

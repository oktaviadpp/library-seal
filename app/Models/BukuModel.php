<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    protected $table ='buku';
    protected $fillable =[
        'id_kategori',
        'id_rak',
        'title',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'desc'
    ];

    //relasi one to Many dgn RakModel
    public function rak()
    {
        return $this->belongsTo(RakModel::class, 'id_rak');
    }
    //relasi one to Many dgn KategoriModel
    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori');
    }
}

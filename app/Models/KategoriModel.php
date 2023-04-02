<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    protected $table='kategoribuku';
    protected $fillable=[
        'id_rak',
        'name',
        'code'
    ];

    //relasi one to one dengan RakModel
    public function rak()
    {
        return $this->belongsTo(RakModel::class, 'id_rak');
    }

    //relasi one to Many dgn BukuModel
    public function buku()
    {
        return $this->hasMany(BukuModel::class, 'id_rak');
    }
}

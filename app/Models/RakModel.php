<?php

namespace App\Models;

use Database\Factories\RakFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class RakModel extends Model
{
    use HasFactory;

    protected $table='rakbuku';
    protected $fillable=[
        'name',
        'code'
    ];
    protected static function newFactory(): Factory
    {
        return RakFactory::new();
    }

    //relasi one to one dengan KategoriModel
    public function kategori()
    {
        return $this->hasOne(KategoriModel::class, 'id_rak');
    }

    //relasi one to Many dgn BukuModel
    public function buku()
    {
        return $this->hasMany(BukuModel::class, 'id_rak');
    }
}


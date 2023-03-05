<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RakModel extends Model
{
    use HasFactory;
    protected $table='contoh';
    protected $fillable=[
        'nama',
        'nomor'
    ];
}

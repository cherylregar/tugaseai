<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $primaryKey = 'idPelanggan';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'idPelanggan', 
        'username', 
        'emailPel', 
        'passPel', 
        'NIM', 
        'idKampus', 
        'idFakultas',
        'jenisKel'
    ];
}

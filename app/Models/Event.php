<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'idEvent',
        'nmEvent',
        'tglEvent',
        'TempatEvent',
        'JumlahPeserta',
        'JamMulai',
        'JamBerakhir',
    ];
}

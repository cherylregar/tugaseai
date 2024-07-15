<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event'; // Specify the table name if different from the model name
    public $timestamps = false; // Disable automatic management of created_at and updated_at

    protected $fillable = [
        'idEvent', 
        'nmEvent', 
        'tglEvent', 
        'TempatEvent', 
        'JumlahPeserta', 
        'JamMulai', 
        'JamBerakhir', 
        'idPelanggan',
    ];

    // Additional model logic, relationships, or methods can be added here
}

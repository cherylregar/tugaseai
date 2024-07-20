<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event'; 
    protected $primaryKey = 'idEvent'; 
    public $timestamps = false; 
    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable = [
        'idEvent', 
        'nmEvent', 
        'tglEvent', 
        'TempatEvent', 
        'JumlahPeserta', 
        'JamMulai', 
        'JamBerakhir', 
        'idPelanggan',
        'status', 
    ];

    // Additional model logic, relationships, or methods can be added here
}

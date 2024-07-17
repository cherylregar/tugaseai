<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    use HasFactory;

    protected $table = 'kampus';
    protected $primaryKey = 'idKampus';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idKampus',
        'alamatKampus',
        'nmKampus',
    ];
}

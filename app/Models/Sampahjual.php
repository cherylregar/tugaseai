<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampahJual extends Model
{
    protected $table = 'sampahjual';
    protected $primaryKey = 'idSampah';
    public $timestamps = false;

    protected $fillable = [
        'nmSampah',
        'poinSampah',
        'foto'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas';
    protected $primaryKey = 'idFakultas';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['idFakultas', 'idKampus', 'nmFakultas'];
    public $timestamps = false;

    public function kampus()
    {
        return $this->belongsTo(Kampus::class, 'idKampus', 'idKampus');
    }
}

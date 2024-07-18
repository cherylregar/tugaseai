<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wastepals extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan oleh model ini
    protected $table = 'wastepals';

    // Menentukan primary key dari tabel ini
    protected $primaryKey = 'idWpal';

    // Menonaktifkan timestamp jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = false;

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'idWpal',
        'emailWpal',
        'passWpal',
        'nmWpal',
        'fotoWpal'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampahJual extends Model
{
    protected $table = 'sampahjual'; // Nama tabel dalam basis data

    protected $primaryKey = 'idSampah'; // Nama kolom primary key

    public $incrementing = false; // Karena idSampah adalah string

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true; // Menyatakan bahwa tabel memiliki kolom created_at dan updated_at

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idSampah', // Primary key, perlu dideklarasikan jika akan diisi secara manual
        'nmSampah', // Kolom nama sampah
        'poinjual', // Kolom poin jual
        'foto', // Kolom nama file foto
        // 'created_at', // Kolom tanggal dan waktu pembuatan (secara default Eloquent akan mengelola ini)
        // 'updated_at', // Kolom tanggal dan waktu pembaruan (secara default Eloquent akan mengelola ini)
    ];
}

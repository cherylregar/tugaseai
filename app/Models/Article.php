<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin; // Import model Admin

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $primaryKey = 'idArtikel'; // Nama primary key
    public $incrementing = false; // Tidak menggunakan auto-increment untuk primary key
    protected $keyType = 'string'; // Tipe data primary key

    protected $fillable = [
        'judulArtikel',
        'isiArtikel',
        'idAdmin',
        'fotoArtikel',
    ];

    // Definisikan relasi ke model Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'idAdmin', 'idAdmin');
    }
}

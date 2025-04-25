<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

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

    // Relasi dengan Kampus
    public function kampus()
    {
        return $this->belongsTo(Kampus::class, 'idKampus');
    }

    // Relasi dengan Fakultas
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'idFakultas');
    }

    // Mutator untuk password
    public function setPasswordAttribute($value)
    {
        $this->attributes['passPel'] = Hash::make($value);
    }

    // Di dalam Pelanggan.php
public function setPassPelAttribute($value)
{
    $this->attributes['passPel'] = Hash::make($value);
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventWastepalsSampah extends Model
{
    use HasFactory;

    protected $table = 'eventWastepalsSampah';

    protected $fillable = [
        'idEvent',
        'idWPal',
        'idSampah',
        'jumlahKilo',
        'statusSetor',
    ];

    // Define relationships if any
    public function event()
    {
        return $this->belongsTo(Event::class, 'idEvent', 'idEvent');
    }

    public function wastepal()
    {
        return $this->belongsTo(Wastepal::class, 'idWPal', 'idWPal');
    }

    public function sampah()
    {
        return $this->belongsTo(SampahJual::class, 'idSampah', 'idSampah');
    }
}

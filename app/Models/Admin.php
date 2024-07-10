<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'idAdmin',
        'nmAdmin',
        'emailAdmin',
        'passAdmin',
    ];

    protected $hidden = [
        'passAdmin',
    ];

    protected $table = 'admins';
    protected $primaryKey = 'idAdmin';
    public $incrementing = false; // Set incrementing to false if the primary key is not auto-incrementing

    // Define the field name for the password
    public function getAuthPassword()
    {
        return $this->passAdmin;
    }

    public function getEmailField()
    {
        return 'emailAdmin';
    }
}

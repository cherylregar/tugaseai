<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nmAdmin',
        'emailAdmin',
        'passAdmin',
    ];

    protected $hidden = [
        'passAdmin',
    ];

    protected $table = 'admins';
    protected $primaryKey = 'idAdmin';

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

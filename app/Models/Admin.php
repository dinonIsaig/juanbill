<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'admin_id';

    public $timestamps = false;

    public $incrementing = false;
    
     /**
     * The attributes that are mass assignable.
     */

    protected $fillable = [
        'admin_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'contact_no',
        'dob',
        'username',
        'password',
        'is_registered',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}

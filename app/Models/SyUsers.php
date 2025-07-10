<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SyUsers extends Authenticatable
{
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
    ];
}

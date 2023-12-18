<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class admin extends Authenticatable implements AuthenticatableContract
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}



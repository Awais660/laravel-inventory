<?php

namespace App\Models;

use App\Models\User;
use App\Models\feedback;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $primaryKey = 'id';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    use HasFactory;
}

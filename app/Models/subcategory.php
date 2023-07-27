<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $primaryKey = 'sid';
    public function category(){
        return $this->belongsTo('App\Models\Category','scname','cid');
    }

    
    use HasFactory;
}

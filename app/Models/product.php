<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $primaryKey="pid";
    public function category(){
        return $this->belongsTo('App\Models\Category','pcat','cid');
    }

    public function subcategory(){
        return $this->belongsTo('App\Models\subcategory','psubcat','sid');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\supplier','psupplier','sup_id');
    }

    public function quantity(){
        return $this->belongsTo('App\Models\quantity','pquantity','qid');
    }

    public function product_attrs(){
        return $this->hasMany('App\Models\product_attr','ap_id','pid');
    }

    public function product_attr(){
        return $this->hasOne('App\Models\product_attr','ap_id','pid');
    }
    use HasFactory;
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = "products";
    protected $primaryKey = "prd_id";
    public $timestamps = false;

    public function categories()
    {
    	return $this->belongsTo('App\Models\categories', 'cat_id', 'id');
    }


}

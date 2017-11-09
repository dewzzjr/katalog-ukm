<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    public function productedBy()
    {
        return $this->belongsTo('App\Ukm');
    }

    public function image()
    {
        return DB::table('product_images')->where('ukm_id', $this->id );
    }
}

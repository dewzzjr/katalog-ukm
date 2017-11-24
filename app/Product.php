<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    public function productedBy()
    {
        return $this->belongsTo('App\Ukm', 'ukm_id', 'id');
    }

    public function image()
    {
        return DB::table('product_images')->where('ukm_id', $this->id );
    }

    public function getMoneyAttribute()
    {
        return sprintf('Rp %s', number_format((float) $this->price , 2 , ',' , '.'));
    }
}

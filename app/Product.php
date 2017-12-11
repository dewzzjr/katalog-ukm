<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    
    public function productedBy()
    {
        return $this->belongsTo('App\Ukm', 'ukm_id', 'id');
    }

    public function image()
    {
        $image = DB::table('product_images')->where('product_id', $this->id )->value('path');
        if(isset($image))
        {
            return 'storage/' . $image;
        } else 
        return '';
    }

    public function deleteImage ()
    {
        $images = DB::table('product_images')->where('product_id', $this->id )->get();
        foreach($images as $image)
        {
            Storage::disk('local')->delete($image->path);
        }
        DB::table('product_images')->where('product_id', $this->id )->delete();
    }

    public function getMoneyAttribute()
    {
        return sprintf('Rp %s', number_format((float) $this->price , 2 , ',' , '.'));
    }
}

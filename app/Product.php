<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            Storage::disk('public')->delete($image->path);
        }
        DB::table('product_images')->where('product_id', $this->id )->delete();
    }

    public function getMoneyAttribute()
    {
        return sprintf('Rp %s', number_format((float) $this->price , 2 , ',' , '.'));
    }

    public function scopeSearch( $query, $value )
    {
        return $query
        ->where('products.name', 'LIKE', '%' . $value . '%')
        ->orWhere('description', 'LIKE', '%' . $value . '%');
    }

    public function scopeCategory( $query, $value )
    {
        return $query
        ->orWhere('category_id', $value);
    }

    public function scopeCard( $query )
    {
        return $query
        ->join('ukm', 'ukm.id', '=', 'products.ukm_id')
        ->join('categories', 'ukm.category_id', '=', 'categories.id')
        ->select(
            'products.*', 
            'categories.identifier as category',
            'ukm.category_id as category_id',
            'ukm.name as ukm_name'
        );
    }
}

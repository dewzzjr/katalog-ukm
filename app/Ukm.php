<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ukm extends Model
{
    protected $table = 'ukm';

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function detail()
    {
        return DB::table('ukm_details')->where('ukm_id', $this->id );
    }

    public function scopeImageUkm( $query )
    {
        return $query 
        ->join('ukm_images', 'ukm.id', '=', 'ukm_images.ukm_id')
        ->where('ukm_id', $this->id )
        ->select(
            'ukm_images.id as id', 
            'ukm.id as ukm_id', 
            'ukm.name as ukm_name',
            'ukm_images.description as description',
            'path'
        );
    }

    public function scopeImageProduct( $query )
    {
        return $query 
        ->join('products', 'ukm.id', '=', 'products.ukm_id')
        ->join('product_images', 'products.id', '=', 'product_images.product_id')
        ->where('ukm_id', $this->id )
        ->select(
            'product_images.id as id', 
            'ukm.id as ukm_id', 
            'products.id as product_id', 
            'ukm.name as ukm_name',
            'products.name as product_name',
            'product_images.description as description',
            'path'
        );
    }

    
    public function deleteImage ()
    {
        $images = DB::table('ukm_images')->where('ukm_id', $this->id )->get();
        foreach($images as $image)
        {
            Storage::disk('public')->delete($image->path);
        }
        DB::table('ukm_images')->where('ukm_id', $this->id )->delete();
    }

    public function location()
    {
        return $this->hasOne('App\Location');
    }

    public function phone()
    {
        return DB::table('ukm_details')->where('ukm_id', $this->id )->where('type', 'telepon');
    }

    public function scopeSearch( $query, $value )
    {
        return $query
        ->where('ukm.name', 'LIKE', '%' . $value . '%')
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
        ->join('categories', 'ukm.category_id', '=', 'categories.id')
        ->join('locations', 'ukm.id', '=', 'locations.ukm_id')
        ->select(
            'ukm.id as id', 
            'ukm.name as name', 
            'ukm.description as description',
            'categories.identifier as category',
            'alamat',
            'kecamatan',
            'kabupaten',
            'latitude',
            'longitude'
        );
    }
}

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

    public function image()
    {
        return DB::table('ukm_images')->where('ukm_id', $this->id );
    }

    public function location()
    {
        return DB::table('locations')->where('ukm_id', $this->id );
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Ukm;
use App\User;

class AjaxController extends Controller
{
    public function getUser(Request $request)
    {
        $query = DB::table('users')->select('id','name');
        if (($q = $request->input('query')) != null) $query = $query->whereRaw('LOWER(`name`) LIKE ? ',['%'.trim(strtolower($q)).'%']);
        $query = $query->take(5)->get();
        return $query;
    }
    public function getCategory()
    {
        $query = DB::table('categories')->select('id','name');
        $query = $query->take(5)->get();
        return response()->json($query, 200);
    }
    public function getUkm(Request $request)
    {
        $query = DB::table('ukm')->select('id','name');
        if (($q = $request->input('query')) != null) $query = $query->whereRaw('LOWER(`name`) LIKE ? ',['%'.trim(strtolower($q)).'%']);
        $query = $query->take(5)->get();
        return $query;
    }
    public function getProduct(Request $request)
    {
        $query = DB::table('products')->select('id','name');
        if (($q = $request->input('query')) != null) $query = $query->whereRaw('LOWER(`name`) LIKE ? ',['%'.trim(strtolower($q)).'%']);
        $query = $query->take(5)->get();
        return $query;
    }
}
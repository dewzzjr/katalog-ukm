<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Ukm;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Cornford\Googlmapper\MapperServiceProvider;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application user dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user_count'    => User::count(),
            'ukm_count'     => Ukm::count(),
            'product_count' => Product::count(),
        ];
        return view('admin.dashboard')->with($data);
    }

    public function user()
    {
        $users = User::all();
        $users = $users->each(function ($item, $key) {
            $item->ukm = $item->ukm()->first();
        });
        $data = [
            'users' => $users,
        ];
        // return $data;
        return view('admin.user')->with($data);
    }
    
    public function ukm()
    {
        $ukms = Ukm::all();
        $ukms = $ukms->each(function ($item, $key) {
            $item->user = $item->owner()->first();
            $item->cat = $item->category()->first();
            $item->location = $item->location()->first();
        });
        $data = [
            'ukms' => $ukms,
        ];
        // -8, 112, 
        Mapper::location('Blitar')->map(['zoom' => 14, 'marker' => false, 'eventBeforeLoad' => 'addMarkerListener(map);']);
        // return $data;
        return view('admin.ukm')->with($data);
    }

    public function image()
    {
        $products = DB::table('product_images')
        ->join('products', 'product_images.product_id', '=', 'products.id')
        ->join('ukm', 'products.ukm_id', '=', 'ukm.id')
        ->select('ukm.user_id as user_id', 'products.ukm_id as ukm_id', 'product_images.*')
        ->orderBy('product_id', 'asc')
        ->get();

        $ukms = DB::table('ukm_images')
        ->join('ukm', 'ukm_images.ukm_id', '=', 'ukm.id')
        ->orderBy('ukm_id', 'asc')
        ->select('ukm.user_id as user_id', 'ukm_images.*')
        ->get();

        $users = DB::table('user_images')->orderBy('user_id', 'asc')->get();
        $data = [
            'ukms' => $ukms,
            'users' => $users,
            'products' => $products,
        ];
        // return $data;
        return view('admin.image')->with($data);
    }

    public function product()
    {
        $products = Product::all();
        $products = $products->each(function ($item, $key) {
            $item->ukm = $item->productedBy()->first();
        });
        $data = [
            'products' => $products,
        ];
        // return $data;
        return view('admin.product')->with($data);
    }

    
    public function password()
    {
        return view('admin.password');
    }
}

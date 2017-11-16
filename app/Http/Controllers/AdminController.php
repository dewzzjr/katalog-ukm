<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Ukm;

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
        $users = User::where('is_admin', 0)->get();
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
        return view('admin.ukm');
    }
    
    public function product()
    {
        return view('admin.product');
    }

    
    public function password()
    {
        return view('admin.password');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ukm;
use App\Category;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Cornford\Googlmapper\MapperServiceProvider;

class HomeController extends Controller
{
    
    /**
     * Show the welcome screen.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function home(Request $req)
    {

        $data = Ukm::card();
        $data = $data->orderBy('name', 'asc');
        $data = $data->skip(0)->take(8);
        $data = $data->get();
        $result = array();
        $i = 0;
        foreach ($data as $key) {
            // Get count Product
            $count = Ukm::find($key->id)->product()->count();

            // Get Category
            $cat = $this->getCategory($key->category);

            // Get Address
            $address = $key->alamat . ', ';
            $address .= $key->kecamatan . ', ';
            $address .= $key->kabupaten;

            // Set Mapper
            $mapDescription = $key->name . ": " . $key->description;
            Mapper::map(
                $key->latitude, 
                $key->longitude
            );

            // Set result Array
            array_push($result, [
                'id'            => $key->id,
				'order'			=> $i++,
				'name' 			=> $key->name,
				'description' 	=> $key->description,
				'category' 		=> $key->category,
				'latitude' 		=> $key->latitude,
				'longitude'		=> $key->longitude,
				'count'			=> $count,
				'cat_color' 	=> $cat['color'],
				'cat_icon' 		=> $cat['icon'],
				'address' 		=> $address,
            ]);
        }
        
        return view('home')->with('data', $result);
    }

    private function getCategory(string $type)
    {

        $cat = Category::where('identifier', $type)->first();
        $color = [
            1 => 'green',
            2 => 'red',
            3 => 'blue',
        ];
        $icon = [
            1 => 'cut',
            2 => 'food',
            3 => 'pied piper hat',
        ];
        $result['color'] =  $color[$cat->id];
        $result['icon'] = $icon[$cat->id];
        return $result;
    }

    public function detailUkm($id) {
        if( ! is_numeric($id) OR $id < 0) {
            abort(404);
        }
        
        $ukm = Ukm::find($id);
        $category = $ukm->category()->first();
        $owner = $ukm->owner()->first();
        $contact = $ukm->detail()->get();
        $product = $ukm->product()->get();

        $ukm['category'] = $category;
        $ukm['owner'] = $owner;
        $ukm['contact'] = $contact;
        $ukm['product'] = $product;
        
        unset($ukm['category_id']);
        unset($ukm['user_id']);
        return $ukm;
        
        $data = [
            'name' => $ukm->name,
            'contact' => $ukm->contact,
            'product' => $ukm->product,
        ];
        return view('detail.ukm')->with($data);
    }
}

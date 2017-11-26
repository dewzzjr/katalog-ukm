<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ukm;
use App\User;
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
            array_push($result, $this->constructCard($key, $i));
            $i++;
        }
        
        // return $data;
        return view('home')->with('data', $result);
    }

    private function constructCard($key, $order) {
        $count = Ukm::find($key->id)->product()->count();
        $cat = $this->getCategory($key->category);
        $address = $this->getAddress($key);
        Mapper::map(
            $key->latitude, 
            $key->longitude
        );

        return [
            'id'            => $key->id,
            'order'			=> $order,
            'name' 			=> $key->name,
            'description' 	=> $key->description,
            'category' 		=> $key->category,
            'latitude' 		=> $key->latitude,
            'longitude'		=> $key->longitude,
            'count'			=> $count,
            'cat_color' 	=> $cat['color'],
            'cat_icon' 		=> $cat['icon'],
            'address' 		=> $address,
            'alamat' 		=> $key->alamat,
            'kecamatan' 	=> $key->kecamatan,
            'kabupaten' 	=> $key->kabupaten,
        ];
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
        $image = $ukm->image()->get();
        $phone = $ukm->phone()->first();
        $location = $ukm->location()->first();

        $ukm['category'] = $category;
        $ukm['owner'] = $owner;
        $ukm['address'] = $this->getAddress($location);
        $ukm['phone'] = $phone;
        $ukm['contact'] = $contact;
        $ukm['product'] = $product;
        $ukm['gallery'] = $image;
        unset($ukm['category_id']);
        unset($ukm['user_id']);
        $types = [
                'website',
                'telepon',
                'whatsapp',
                'facebook',
                'instagram',
                'twitter',
                'line',
                'tokopedia',
                'bukalapak',
        ];
        foreach($types as $type) 
        {
            $ukm['has_' . $type] = false;
        }
        if( ! is_null($ukm->phone))
        {
            unset($ukm->phone->ukm_id);
            unset($ukm->phone->id);
        }
        for($i=0; $i < sizeOf($ukm->contact); $i++) 
        {
            $ukm['has_' . $ukm->contact[$i]->type] = true;
            unset($ukm->contact[$i]->ukm_id);
            unset($ukm->contact[$i]->id);
        }
        // return $ukm;
        return view('detail.ukm')->with('data', $ukm);
    }

    public function getProfile($id = null) {
        if ($id == null) {
            $id = Auth::id();
            if($id == null) return redirect()->route('login');
        }
        $user = User::findOrFail($id);
        $user->ukm = $user->ukm()->card()->first();
        $image = $user->image()->first();
        $user->url = ( $image != null ? 'storage/' . $image->path : 'default-profile.jpg');
        if( $user->ukm != null )
        {
            $user->ukm = $this->constructCard($user->ukm, 0);
        } else {
            Mapper::location('Blitar')->map(['marker' => false, 'eventBeforeLoad' => 'addMarkerListener(map);']);
        }

        if( $user->id == Auth::id() )
        {
            Mapper::map($user->ukm['latitude'], $user->ukm['longitude'], ['marker' => true, 'eventBeforeLoad' => 'addMarkerListener(map);']);
                    //->marker($user->ukm['latitude'], $user->ukm['longitude']);
                    
        }
        // return $user;
        return view('user.profile')->with('data', $user);
    }

    private function getAddress($location) {
        $address = $location->alamat . ', ';
        $address .= $location->kecamatan . ', ';
        $address .= $location->kabupaten;
        return $address;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ukm;
use App\Location;
use Validator;
use Redirect;

class UkmController extends Controller
{
    /**
     * Show the application user dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ukm');
    }

    
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'	    => 'required|exists:users,id',
            'category_id'	=> 'required|exists:categories,id',
            'name'      => 'required|max:255',
            'latitude'	=> 'required',
            'longitude'	=> 'required',
            'description'   =>	'required',
            'alamat'	    =>  'required|max:255',
            'kabupaten'	    =>  'required|max:255',
            'kecamatan'     =>  'required|max:255',
        ]);
        // If validator fails, short circut and redirect with errors
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        //add new ukm to database
        $ukm = new Ukm;
        $ukm->name = $request->input('name');
        $ukm->description = $request->input('description');
        $ukm->user_id = $request->input('user_id');
        $ukm->category_id = $request->input('category_id');
        $ukm->save();
        
        $location = new Location;
        $location->ukm_id = $ukm->id;
        $location->alamat = $request->input('alamat');
        $location->kabupaten = $request->input('kabupaten');
        $location->kecamatan = $request->input('kecamatan');
        $location->latitude = $request->input('latitude');
        $location->longitude = $request->input('longitude');
        $location->save();
        return  redirect()->back()->with('message', 'UKM telah dibuat.');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id'	    => 'required|exists:users,id',
            'category_id'	=> 'required|exists:categories,id',
            'name'  => 'required|max:255',
            'latitude'	=> 'required',
            'longitude'	=> 'required',
            'description'   =>	'required',
            'alamat'	    =>  'required|max:255',
            'kabupaten'	    =>  'required|max:255',
            'kecamatan'     =>  'required|max:255',
        ]);
        // If validator fails, short circut and redirect with errors
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        //add new ukm to database
        $ukm = Ukm::find($id);
        $ukm->name = $request->input('name');
        $ukm->description = $request->input('description');
        $ukm->user_id = $request->input('user_id');
        $ukm->category_id = $request->input('category_id');
        $ukm->save();
        
        $location = Ukm::location();
        $location->ukm_id = $ukm->id;
        $location->alamat = $request->input('alamat');
        $location->kabupaten = $request->input('kabupaten');
        $location->kecamatan = $request->input('kecamatan');
        $location->latitude = $request->input('latitude');
        $location->longitude = $request->input('longitude');
        $location->save();
        return  redirect()->back()->with('message', 'UKM telah diupdate.');
    }

    public function delete(Request $request, $id)
    {
        $ukm = Ukm::findOrFail($id);
        $locations = $ukm->location();
        if ($locations != null) {
            foreach ($locations as $location) {
                $location->delete();
            }
        }
        $ukm->delete();
        return  redirect()->back()->with('message', 'UKM telah dihapus.');
    }

    public function uploadImage(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            if($request->file('image')->isValid()) {
                try {
                    $photoName = time().'.'.$request->image->getClientOriginalExtension();
                    $request->image->move(public_path('ukm/' . $id ), $photoName);
                    return redirect()->back()->with('message', 'Gambar telah terupload');
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                    redirect()->back()->withErrors(['message', 'File tidak ditemukan!']);
                }
            }
        }
    }
}

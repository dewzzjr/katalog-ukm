<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        ],
        [
            'longitude.required' => 'Map is not set',
            'latitude.required'  => 'Map is not set'
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
        return redirect()->back()->with('message', 'UKM telah dibuat.');
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
        ],
        [
            'longitude.required' => 'Map is not set',
            'latitude.required'  => 'Map is not set'
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
        
        $location = $ukm->location()->first();
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

    public function detail(Request $request, $id)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'telepon'	    => 'required|numeric|min:11',
            'whatsapp'  	=> 'nullable|numeric|min:11',
            'facebook'      => 'nullable|regex:/^[A-z0-9_]+$/',
            'twitter'  	    => 'nullable|regex:/^[A-z0-9_]+$/',
            'instagram' 	=> 'nullable|regex:/^[A-z0-9_]+$/',
        ]);

        // If validator fails, short circut and redirect with errors
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        //add new ukm to database
        $ukm = Ukm::findOrFail($id);
        
        foreach ($request->all() as $key => $value) {
            if ( $key == '_token' || $key == 'id' ) { // token
                continue;
            }
            $exist = DB::table('ukm_details')
                ->where('ukm_id', $id )
                ->where('type', $key)->get();
            if ( count($exist) > 0 ) :
                if($request->input($key) == null)
                {
                    DB::table('ukm_details')
                    ->where('ukm_id', $id )
                    ->where('type', $key)
                    ->delete();
                } else
                {
                    DB::table('ukm_details')
                    ->where('ukm_id', $id )
                    ->where('type', $key)
                    ->update([
                        'contact' => $value
                    ]);
                }
            else :
                if($request->input($key) != null)
                {
                    DB::table('ukm_details')->insert([
                        'ukm_id'  => $id,
                        'contact' => $value,
                        'type'    => $key
                    ]);
                }
            endif;
        }
        return redirect()->back()->with('message', 'Detail UKM telah diperbarui.');
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

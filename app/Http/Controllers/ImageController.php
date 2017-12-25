<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;
use Validator;

class ImageController extends Controller
{
    
    public function create(Request $request)
    {
        // return $request;
        $rule = [];
        if ($request->input('product_id') !== null) {
            $rule['product_id'] = 'required|exists:products,id';
        } else 
        if ($request->input('ukm_id') !== null) {
            $rule['ukm_id'] = 'required|exists:ukm,id';
        } else 
        if ($request->input('user_id') !== null) {
            $rule['user_id'] = 'required|exists:users,id';
        } else {
            $rule['user_id'] = 'required|exists:users,id';
            $rule['ukm_id'] = 'required|exists:ukm,id';
            $rule['product_id'] = 'required|exists:products,id';
        }

        $rule['description'] =	'required';
        $rule['image']       =  'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120';

        // var_dump($rule);die();
        $validator = Validator::make($request->all(), $rule);

        // If validator fails, short circut and redirect with errors
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        
        if ($request->input('product_id') !== null) {
            $this->_doUpload(
                'product',
                $request->input('product_id'),
                $request->input('description'),
                $request->file('image')
            );
        } else 
        if ($request->input('ukm_id') !== null) {
            $this->_doUpload(
                'ukm',
                $request->input('ukm_id'),
                $request->input('description'),
                $request->file('image')
            );
        } else 
        if($request->input('user_id') !== null) {
            $this->_doUpload(
                'user',
                $request->input('user_id'),
                "Gambar Profil",
                $request->file('image')
            );
        }
        
        return redirect()->back()->with('message','Image Upload successful');
    }

    private function _doUpload($type, $id, $description, $file) {
        if($type == 'user') {
            User::find($id)->deleteImage();
        }
        $path = Storage::disk('public')->putFile($type . '/' . $id, $file);
        $id = DB::table($type . '_images')->insertGetId(
            [
                $type . '_id'   => $id, 
                'description'   => $description,
                'path'          => $path,
                'ext'           => $file->getClientOriginalExtension(),
            ]
        );
    }

    public function delete(Request $request, $type, $id)
    {
        $images = DB::table($type . '_images')->where('id', $id )->get();
        foreach($images as $image)
        {
            Storage::disk('public')->delete($image->path);
        }
        DB::table($type . '_images')->where('id', $id )->delete();
        return redirect()->back()->with('message','Gambar sudah dihapus');
    }

    public function description(Request $request, $type, $id)
    {
        $rule = [];
        if ($request->input('product_id') !== null) {
            $rule['product_id'] = 'required|exists:products,id';
        } else 
        if ($request->input('ukm_id') !== null) {
            $rule['ukm_id'] = 'required|exists:ukm,id';
        } else 
        if($request->input('user_id') !== null) {
            $rule['user_id'] = 'required|exists:users,id';
        } else {
            $rule['user_id'] = 'required|exists:users,id';
            $rule['ukm_id'] = 'required|exists:ukm,id';
            $rule['product_id'] = 'required|exists:products,id';
        }

        $rule['description'] =	'required';

        // var_dump($rule);die();
        $validator = Validator::make($request->all(), $rule);

        // If validator fails, short circut and redirect with errors
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        
        DB::table($type . '_images')->where('id', $id)->update($request->all());
        return redirect()->back()->with('message','Deskripsi sudah diubah');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Validator;

class ImageController extends Controller
{
    
    public function create(Request $request)
    {
        $rule = [];
        if($request->input('user_id') !== null) {
            $rule['user_id'] = 'required|exists:users,id';
        } else 
        if ($request->input('ukm_id') !== null) {
            $rule['ukm_id'] = 'required|exists:ukm,id';
        } else 
        if ($request->input('product_id') !== null) {
            $rule['product_id'] = 'required|exists:products,id';
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
        
        if($request->input('user_id') !== null) {
            $this->doUpload(
                'user',
                $request->input('user_id'),
                $request->input('description'),
                $request->file('image')
            );
        } else 
        if ($request->input('ukm_id') !== null) {
            $this->doUpload(
                'ukm',
                $request->input('ukm_id'),
                $request->input('description'),
                $request->file('image')
            );
        } else 
        if ($request->input('product_id') !== null) {
            $this->doUpload(
                'product',
                $request->input('product_id'),
                $request->input('description'),
                $request->file('image')
            );
        }
        
        return redirect()->back()->with('message','Image Upload successful');
    }

    private function doUpload($type, $id, $description, $file) {
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
}

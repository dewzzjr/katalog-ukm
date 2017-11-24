<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        
        $id = 0;
        $name = "";
        $destination = "";
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        if($request->input('user_id') !== null) {
            $destination = '/user';
            $name = sprintf("%03d", $request->input('user_id')) . '_';
            $id = DB::table('user_images')->insertGetId(
                [
                    'user_id'       => $request->input('user_id'), 
                    'description'   => $request->input('description'),
                    'path'          => $destination . '/' . $name,
                    'ext'           => $extension,
                ]
            );
        } else 
        if ($request->input('ukm_id') !== null) {
            $destination = '/ukm';
            $name = sprintf("%03d", $request->input('ukm_id')) . '_';
            $id = DB::table('ukm_images')->insertGetId(
                [
                    'ukm_id'        => $request->input('ukm_id'), 
                    'description'   => $request->input('description'),
                    'path'          => $destination . '/' . $name,
                    'ext'           => $extension,
                ]
            );
        } else 
        if ($request->input('product_id') !== null) {
            $destination = '/product';
            $name = sprintf("%03d", $request->input('product_id')) . '_';
            $id = DB::table('product_images')->insertGetId(
                [
                    'product_id'    => $request->input('product_id'), 
                    'description'   => $request->input('description'),
                    'path'          => $destination . '/' . $name,
                    'ext'           => $extension,
                ]
            );
        }
        
        $input['imagename'] = $name . sprintf("%03d", $id) . '.' . $extension;
        $destinationPath = public_path($destination);
        $image->move($destinationPath, $input['imagename']);
        return redirect()->back()->with('message','Image Upload successful');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;
use Redirect;

class ProductController extends Controller
{
    
    /**
     * Show the application ukm dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product');
    }

    
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ukm_id'	    => 'required|exists:ukm,id',
            'name'          => 'required|max:255',
            'description'   => 'required',
            'price'         => 'required|min:0',
        ]);
        // If validator fails, short circut and redirect with errors
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        //add new ukm to database
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->ukm_id = $request->input('ukm_id');
        $product->save();
        
        return  redirect()->back()->with('message', 'Produk telah dibuat.');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ukm_id'	    => 'required|exists:ukm,id',
            'name'          => 'required|max:255',
            'description'   => 'required',
            'price'         => 'required|min:0',
        ]);
        // If validator fails, short circut and redirect with errors
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        //add new ukm to database
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->ukm_id = $request->input('ukm_id');
        $product->save();
        
        return  redirect()->back()->with('message', 'Produk telah diupdate.');
    }

    public function delete(Request $request, $id)
    {
        $product = Ukm::findOrFail($id);
        $locations = $product->location();
        if ($locations != null) {
            foreach ($locations as $location) {
                $location->delete();
            }
        }
        $product->delete();
        return  redirect()->back()->with('message', 'Produk telah dihapus.');
    }

    public function uploadImage(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            if($request->file('image')->isValid()) {
                try {
                    $photoName = time().'.'.$request->image->getClientOriginalExtension();
                    $request->image->move(public_path('product/' . $id ), $photoName);
                    return redirect()->back()->with('message', 'Gambar telah terupload');
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                    redirect()->back()->withErrors(['message', 'File tidak ditemukan!']);
                }
            }
        }
    }
}

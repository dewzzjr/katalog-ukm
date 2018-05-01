<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;

class ProfileController extends Controller
{
    function setProfile(Request $request) 
    {
        // return $request;
        $id = $request->input('id');
        $user = Auth::user();
        if( $user->id != $id ) return abort(403);

        $rules = [];

        if($request->input('email') != $user->email) 
        {
            $rules
                ['email']         = 'required|email|unique:users,email,'.$user->id;
            $rules
                ['password']      = 'required|hash:' . $user->password;
            
        }

        if($request->input('newpassword') != null) 
        {
            $rules
                ['newpassword']   = 'required|different:password|confirmed|min:6';
            $rules
                ['password']      = 'required|hash:' . $user->password;
            
        }

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails())
        {
            return back()
            ->withErrors($validator);
        }

        if($request->input('newpassword') != null) 
        {
            $user->password = bcrypt($request->input('newpassword'));
        }
        
        if($request->input('email') != $user->email) 
        {
            $user->email = $request->input('email');
        }

        $user->save();
        return redirect()->back()
            ->with('success', 'Profil telah diubah');
    }

    function setUkm(Request $request) 
    {
        // return $request->all();
        $id = $request->input('user_id');
        $user = Auth::user();
        if( $user->id != $id ) return abort(403);

        $url = null;
        if( $request->id != null ) {
            $url = '/admin/ukm/' . $request->id . '/edit';
        } else {
            $url = '/admin/ukm/add';
        }
        $r = Request::create($url, 'POST', $request->all());
        return app()->handle($r);
    }
}

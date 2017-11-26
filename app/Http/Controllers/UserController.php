<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Redirect;

class UserController extends Controller
{
    /**
     * Show the application user dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdmin()) return redirect('admin');
        return view('user');
    }

    
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'email' => 'required|email|unique:users',
        ]);
        // If validator fails, short circut and redirect with errors
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        //generate a password for the new users
        $pw = User::generatePassword();
        //add new user to database
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $pw;
        User::sendWelcomeEmail($user);
        $user->save();
        return  redirect()->back()->with('message', 'Akun telah dibuat. Email untuk reset password sudah terkirim.');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        // If validator fails, short circut and redirect with errors
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        //edit user to database
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return  redirect()->back()->with('message', 'Akun telah diupdate.');
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        // User::sendWelcomeEmail($user);
        return  redirect()->back()->with('message', 'Akun telah dihapus.');
    }
    
    public function setAdmin(Request $request, $id)
    {
        $user = User::find($id);
        $user->is_admin = ($user->is_admin ? false : true);
        $user->save();
        // User::sendWelcomeEmail($user);
        return  redirect()->back()->with('message', 'Status admin telah diubah.');
    }

    public function reset(Request $request, $id)
    {
        //generate a password for the new users
        $pw = User::generatePassword();
        $user = User::find($id);
        $user->password = $pw;
        User::sendWelcomeEmail($user);
        $user->save();
        return  redirect()->back()->with('message', 'Email untuk reset password sudah terkirim.');
    }

}

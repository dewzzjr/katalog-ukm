<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mail;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [
        'is_admin',
    ];

    public function ukm()
    {
        return $this->hasOne('App\Ukm');
    }

    
    public function image()
    {
        return DB::table('user_images')->where('user_id', $this->id)->get();
    }

    public function isAdmin()
    {
        return $this->is_admin; // this looks for an admin column in your users table
    }

    public static function generatePassword()
    {
        // Generate random string and encrypt it. 
        return bcrypt(str_random(35));
    }

    public static function sendWelcomeEmail($user)
    {
        // Generate a new reset password token
        $token = app('auth.password.broker')->createToken($user);
        
        // Send email
        Mail::send('emails.welcome', ['user' => $user, 'token' => $token], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Selamat Datang di Katalog UKM');
        });
    }

    public function deleteImage ()
    {
        $images = DB::table('user_images')->where('user_id', $this->id )->get();
        foreach($images as $image)
        {
            Storage::disk('public')->delete($image->path);
        }
        DB::table('user_images')->where('user_id', $this->id )->delete();
    }
}

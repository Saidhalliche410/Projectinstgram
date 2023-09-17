<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * @method static findorfail($user)
 * @method static finorfail($user)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;



    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){

        parent::boot();
        static::created( function ( $var3){

            $var3->profile()->create([
                'title'=>$var3->username,

            ]);



        });

    }


    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function post(){
        return $this->hasMany(Post::class)->orderBy('created_at','DESC');
    }
    public function said()
    {
        return $this->belongsToMany(Profile::class ,'profile_user');
    }

}

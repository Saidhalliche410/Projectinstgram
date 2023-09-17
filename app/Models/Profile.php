<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed
 */
class Profile extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function said()
    {
      return $this->belongsToMany(User::class, 'profile_user');
    }

    public function image(){
        $imagepath = ($this->image) ? $this->image :'profiles/3MqHWzZDaj8bzn3pV3wr8q1ksw9deIG7I6pY8xtj.jpg';
        return   '/storage/'. $imagepath;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}

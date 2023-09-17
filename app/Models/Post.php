<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static crate(array $array)
 * @method static create(array $data)
 * @method static findorfail($var)
 * @method static where(string $string, $users)
 * @method static whereIn(string $string, $users)
 */
class Post extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
}

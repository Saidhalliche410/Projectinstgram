<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
 $users = auth()->user()->said()->pluck('profiles.user_id');
 $posts=Post::whereIn('user_id',$users)->with('user')->orderBy('created_at','DESC')->paginate(5);
return view('posts.index',compact('posts'));
    }

    public function create(){

 return view('posts.create');
}
public function store (){
    $data= request()->validate([
        'caption'=> 'required',
        'image'=> 'required|image',
    ]);
    $said= request('image')->store('images','public');

    $image =Image::make(public_path("storage/{$said}"))->fit(1200,1200);
    $image->save();
     auth()->user()->post()->create([
    'caption'=>$data['caption'],
    'image'=>$said,
]);

return redirect('/profile/'.auth()->user()->id);
}
public function show($var){
        $var= Post::findorfail($var);
        return view ('posts.show',compact('var'));

}
}

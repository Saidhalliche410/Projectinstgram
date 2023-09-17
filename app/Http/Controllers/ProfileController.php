<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index($user)
    {
       $user= User::findorfail($user);
        $follows=(auth()->user()) ? auth()->user()->said->contains($user->id) : false;
        //dd($follows);
        $numberpost=Cache::remember('count.posts.'.$user->id,
        now()->addSecond(30),
        function () use($user){
            return $user->post->count();
        });

        $numberfollowers=Cache::remember('count.follwers.'.$user->id,
            now()->addSecond(30),
            function () use($user){
                return $user->profile->said->count();
            });
        $numberfollowing=Cache::remember('count.following.'.$user->id,
            now()->addSecond(30),
            function () use($user){
                return  $user->said->count();
            });

        return view('profiles.index',compact('user','follows','numberpost','numberfollowers','numberfollowing'));
    }
    public function edit( User $var2){
        $this->authorize('update' , $var2->profile);
        return view('profiles.edit',compact('var2'));
    }

    public function update(User $var2){
        $this->authorize('update' , $var2->profile);
        $data = request()->validate([

            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'',


        ]);

        if(request('image')){
            $said= request('image')->store('profiles','public');

            $image =Image::make(public_path("storage/{$said}"))->fit(1000,1000);
            $image->save();
            $said2= ['image'=>$said];
        }
        auth()->user()->profile->update(array_merge(
            $data,
            $said2 ?? []
        ));
        return redirect("/profile/{$var2->id}");
    }
}

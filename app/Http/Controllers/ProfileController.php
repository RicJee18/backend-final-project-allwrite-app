<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        // $user = User::find($user);
       
        // return view('home',[
        //     'user' => $user
        // ]);
         $follows = (auth()->user())? auth()->user()->following->contains($user->id) : false;
        return view('profile.index',compact('user','follows'));

    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profile.edit',compact('user'));
    }

    public function update(User $user){
        
        $data = request()->validate([

            'title' => 'required',
            'description' => 'required',
            'url'=> 'url',
            'image' => ''
        ]);
         
        if(request('image'))
        {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->resize(1400,1400);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        // $user->profile->update($data);
        auth()->user()->profile->update(array_merge(

            $data,
            $imageArray ?? []

        ));

        return redirect("/profile/{$user->id}");

    }

}

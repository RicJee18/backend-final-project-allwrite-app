<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){


        if($request->query('q')){
            $posts = Post::where('title',"LIKE",'%'.$request->query('q').'%')->paginate(12);
        }
        else{

        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->latest()->paginate(12);
        
        }
        return  view('posts.index', compact('posts'));

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'story' => 'required',
            'image' => ['required', 'image']
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->resize(1000,1000);
        $image->save();
        
        auth()->user()->posts()->create([
            'title'=> $data['title'],
            'story'=> $data['story'],
            'image' => $imagePath
        ]);

        return redirect('/profile/'.auth()->user()->id);
    }

    public function show($id)
    {
        $post = Post::with('comments')->find($id);
        return view('posts.show',compact('post'));

    }


    public function delete($id){

        $postId = Post::findorFail($id);
        $postId->delete();

        return redirect('/profile/'. auth()->user()->id)->with('message','Post Deleted');

    }

    public function edit(Post $post){

        $this->authorize('update', $post);
        return view("posts.edit",compact('post'));
   

    }

    public function update(Post $post, $postId){

        
        $data = request()->validate([
            'title' => 'required',
            'story' => 'required',
            'image' => ['required', 'image']
        ]);

        // condition if there's an existing image
        if(request('image')){

            $imagePath = request('image')->store('uploads','public');

            $image = Image::make(public_path("storage/{$imagePath}"))->resize(1200,1200);
            $image->save();

            $imageArray = ['image' => $imagePath];
  
            
            $updatedArray = array_merge($data,$imageArray);
            Post::where('id',$postId)->update($updatedArray);
         
        }
        else {

            $update = $data;
            Post::where('id',$post->id)->update($update);
    

        }
    
        return redirect('/post/'.$postId);
       

    }

   

    
}

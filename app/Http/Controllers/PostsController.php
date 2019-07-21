<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
        
    return view('welcome', $data);
    }
    
    public function buzz($id)
    {
        $post = new Post;

        return view('posts.buzz', [
            'post' => $post,
            'ramen_id' => $id,
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'fivestar' => 'required',
            'review' => 'required|max:300',
            'image_url' => 'required|max:300',
        ]);
        
        $originalImg = $request->image_url;
        $filePath = $originalImg->store('public');

        $request->user()->posts()->create([
            'fivestar' => $request->fivestar,
            'review' => $request->review,
            'image_url' => str_replace('public/', '', $filePath),
            'ramen_id' => $request->ramen_id,
        ]);

        return redirect('/');
    }
    
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', [
            'post' => $post,
        ]);
        
        return back();
    }
    
    
    public function destroy($id)
    {
        $post = \App\Post::find($id);

        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        return back();
    }
}

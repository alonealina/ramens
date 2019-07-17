<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

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

        $request->user()->posts()->create([
            'fivestar' => $request->fivestar,
            'review' => $request->review,
            'image_url' => $request->image_url,
            'ramen_id' => $request->ramen_id,
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

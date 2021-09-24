<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Input;
use App\Models\Comment;

class PostController extends Controller
{
    public function Createpost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:30',
            'content' => 'required|string',
        ]);

        $user = Auth::user();
        $title = $request['title'];
        $content = $request['content'];

        $post = new Post([
            'title' => $title,
            'content' => $content]);
        $user->post()->save($post);

        //$posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::all()->sortByDesc('created_at');
        $comments = Comment::all();
        return view('home', ['posts' => $posts, 'comments' => $comments]);
    }

    public function editpost($id)
    {
        $post = Post::where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->first();
        return view('Edit', compact('post'));
    }

    public function updatepost(Request $request, $id)
    {
        //$user = Auth::user();
        $post = Post::find($id);


        $post->title = Input::get('title');
        $post->content = Input::get('content');

        $this->validate($request, [
            'title' => 'required|string|max:30',
            'content' => 'required|string',
        ]);

        $post->save();


        Session::flash('flash_message', 'Post has been updated');

        $posts = Post::all();
        return redirect()->route('home', ['posts' => $posts]);

    }

    public function destroypost($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('message', 'Post has been deleted!');

        $posts = Post::all();
        return redirect()->route('home', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::find($id);

        $comments = Comment::all();
        //dd($post);
        return view('Post')->with(['post' => $post, 'comments' => $comments]);
    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminPost;
use App\Models\Post;
use App\Models\Comment;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        //$posts = Post::all();
        $posts = Post::all()->sortByDesc('created_at');
        return view('home', ['posts' => $posts]);
    }

    public function Weeklyupdates()
    {
        $adminposts = AdminPost::all()->sortByDesc('created_at');
        return view('Weeklyupdates', ['adminposts' => $adminposts]);
    }

    public function Story()
    {
        return view('Story');
    }

    public function adminshow($id)
    {
        $adminpost = AdminPost::find($id);

        //dd($post);
        return view('AdminPost')->with(['adminpost' => $adminpost]);
    }

    public function show($id)
    {
        $post = Post::find($id);

        $comments = Comment::all();
        //dd($post);
        return view('Post')->with(['post' => $post, 'comments' => $comments]);
    }

}

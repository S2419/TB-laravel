<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
   


}

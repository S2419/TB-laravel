<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

<<<<<<< HEAD

class SearchController extends Controller
{
=======
class SearchController extends Controller
{


>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
    public function Usersearch(Request $request)
    {

        $this->validate($request, [
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        $users = User::search($query)->paginate(3);
        dd($users);
        return view('Usersearch')->with('users', $users);
    }

    public function getUsersearch(Request $request)
    {
        $query = $request->input('query');

        $users = User::search($query)->paginate(3);
        //dd($users);
        return view('Usersearch')->with('users', $users);
    }

    public function Postsearch(Request $request)
    {

        $this->validate($request, [
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        $posts = Post::search($query)->paginate(3);
        return view('Postsearch')->with('posts', $posts);
    }

    public function getPostsearch(Request $request)
    {


        $query = $request->input('query');


        $posts = Post::search($query)->paginate(3);
        //dd($posts);
        return view('Postsearch')->with('posts', $posts);

    }
<<<<<<< HEAD
}
=======


}

>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb

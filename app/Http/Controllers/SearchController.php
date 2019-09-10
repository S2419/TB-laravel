<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{


    public function Postsearch(Request $request)
    {

        $this->validate($request, [
            'query' =>'required|min:3',
        ]);

        $query = $request->input('query');

        $posts = Post::search($query)->paginate(10);

        return view('Search')->with('posts', $posts);
    }
}


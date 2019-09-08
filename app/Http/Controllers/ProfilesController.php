<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        //$posts = Post::where('user_id', '=', auth()->user()->id)->get();
        $posts = Post::where("user_id", "=", $user->id)->latest('created_at')->get();
        return view('Profile', compact('user','posts'));
    }
}



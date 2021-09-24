<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\User;
use App\Models\Post;
=======
use App\User;
use App\Post;
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewFollower;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        //$posts = Post::where('user_id', '=', auth()->user()->id)->get();
        $posts = Post::where("user_id", "=", $user->id)->latest('created_at')->get();
        return view('Profile', compact('user','posts'));
    }

    public function Follow (Request $request, User  $user)
    {
        $follower = Auth::user();
        if($request->user()->canFollow($user)) {
            $request->user()->following()->attach($user);
        }
        $user->notify(new NewFollower($follower));
        return redirect()->back();
    }

    public function unFollow(Request $request, User $user)
    {

        if($request->user()->canUnfollow($user)) {
            $request->user()->following()->detach($user);
        }

        return redirect()->back();
    }

    public function followlist()
    {
        //$users = User::find($userId)->following()->FindUserName->get();//there is something wrong here
        //$users = User::find($followerId)->following()->get();
        //$users = following::find($followerId)->following()->get();
        //$followers = follower::find($followerId)->following()->get();

        //$followings = Auth::user()->following;
        $users = Auth::user()->following;
        $followers = Auth::user()->followers;
        return view('Followlist',['users' => $users, 'followers' => $followers]);
    }



}
<<<<<<< HEAD
=======


>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb

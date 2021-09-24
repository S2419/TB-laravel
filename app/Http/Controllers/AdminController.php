<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\User;

class AdminController extends Controller
{
    public function CreateWeeklypost(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|string|max:30',
            'content' => 'required|string',
        ]);

        $user = Auth::user();
        $title = $request['title'];
        $content = $request['content'];

        $adminpost = new AdminPost([
            'title' => $title,
            'content' => $content]);
        $user->adminpost()->save($adminpost);

        //$posts = Post::orderBy('created_at', 'desc')->get();
        $adminposts = AdminPost::all()->sortByDesc('created_at');
        return view('Weeklyupdates', ['adminposts' => $adminposts]);
    }

    public function editpost($id)
    {
        $adminpost = AdminPost::where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->first();
        return view('adminpostedit', compact('adminpost'));
    }

    public function updateadminpost(Request $request, $id)
    {
        //$user = Auth::user();
        $adminpost = AdminPost::find($id);


        $adminpost->title = Input::get('title');
        $adminpost->content = Input::get('content');

        $this->validate($request, [
            'title' => 'required|string|max:30',
            'content' => 'required|string',
        ]);

        $adminpost->save();

        Session::flash('flash_message', 'Post has been updated');

        $adminposts = AdminPost::all();
        return redirect()->route('Weeklyupdates', ['adminposts' => $adminposts]);

    }

    public function destroypost($id)
    {
        $adminpost = AdminPost::find($id);
        $adminpost->delete();

        Session::flash('message', 'Post has been deleted!');

        $adminposts = AdminPost::all();
        return redirect()->route('Weeklyupdates', ['adminposts' => $adminposts]);
    }

    public function Admins()
    {
        $users = User::all();
        return view('Adminuser', compact('users'));
    }


    public function index()
    {
        if(!\Gate::allows('isSuperAdmin', 'isAdmin', 'isAuthor')){
            abort(403, 'Sorry, You are unable to access this');
        }

        return view('AdminPost', compact('secret data'));
    }

}

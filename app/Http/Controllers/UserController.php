<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Image;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function update_profilepic(Request $request) {

        //Handles the user upload of the profile pics
        if ($request->hasFile('profilepic')) {
            $profilepic = $request-> file('profilepic');
            $filename = time() . '.' . $profilepic->getClientOriginalExtension();
            Image::make($profilepic)->resize(300, 300)->save( public_path('/uploads/profilepics/' . $filename) );

            $user = Auth::user();
            $user->profilepic = $filename;
            $user->save();

        }
        return redirect()->route('Account');
    }


    public function update(Request $request)
    {


        $user = Auth::user();
        $old_name = $user->username;
        $user->username=$request['username'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['username'] . '-' . $user->id . '.jpg';
        $old_filename = $old_name . '-' . $user->id . '.jpg';
        $update = false;

        if(Storage::disk('local')->has($old_filename)) {
            $old_file = Storage::disk('local')->get($old_filename);
            Storage::disk('local')->put($filename, $old_file);
            $update = true;

        }

        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        if ($update && $old_filename !== $filename) {
            Storage::delete($old_filename);
        }

        return redirect()->route('Account');
    }

    public function Story()
    {
        return view('Story');
    }

    public function Account()
    {
        $posts = Post::where('user_id', '=', auth::user()->id)->latest('created_at')->get();
        return view('Account', array('user' => Auth::user(), 'posts' => $posts));
    }

    public function Editprofile()
    {
        return view('EditProfile', ['user' => Auth::user()]);

    }

    public function SaveAccount(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users'
        ]);

        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        return redirect()->route('Account');
    }

    public function showChangePasswordForm()
    {
        return view('auth.passwords.Changepassword');
    }


    public function changePassword(Request $request)
    {
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))){
            //Check to see if passwords do match
            return redirect()->back()->with('error', 'Oops, seems like the passwords do not match, try again my g');
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) ==0){
            //New password and old are the same
            return redirect()->back()->with('error', 'New password can not be the same as the old my g');
        }

        $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('Password has been changed');
    }

    public function Weeklyupdates()
    {
        return view ('Weeklyupdates');
    }

    public function deleteuser()
    {
        return view ('Deleteaccount', ['user' => Auth::user()]);
    }

    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();


        return redirect()->route('login');
    }




}

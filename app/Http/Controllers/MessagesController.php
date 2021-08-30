<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\PrivateMessageSent;
use App\Notifications\NewMessage;
use Illuminate\Notifications\Notifiable;


class MessagesController extends Controller
{

    use Notifiable;

    public function _construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */

    public function chat()
    {
        //$users = Auth::user()->following;
        //dd($users);
        //return view ('chat',['users' => $users]);
        return view('chat');
    }

    /**
     * Fetch all messages
     *
     * @ return Message
     */

    public function fetchMessages()
    {

        return Message::with('user')->get();

        /*
        $allUsers1 = \DB::table('users')
            ->join('messages', 'users.id', 'messages.user_id')
            ->where('messages.user_to', Auth::user()->id)->get();

        $allUsers2 = \DB::table('users')
            ->join('messages', 'users.id', 'messages.user_id')
            ->where('messages.user_to', Auth::user()->id)->get();
        return array_merge($allUsers1->toArray(), $allUsers2->toArray());
        */
    }
    /*  Public function getMessages($id)
  {
      $update_status = \DB::table('messages')->where('id', $id)->update([
          'status' => 0
      ]);

      $usermessage = DB::table('messages')
          ->join('users', 'users.id','messages.user_from')
          ->where('messages.messages_id', $id)->get();
      return $usermessage;
      //return Message::with('user')->get();

  } */


    public function privateMessages(User $user)
    {
        $privateConversation = Message::with('user')
            ->where(['user_id' => auth()->id(), 'user_to'=>$user->id])
            ->orWhere(function($query)use($user){
                $query->where(['user_id' => $user->id, 'user_to' =>auth()->id()]);
            })
            ->get();

        return $privateConversation;
    }



    /* public function sendMessage(Request $request)
     {
         $user = Auth::user();

         $message = $user->messages()->create([
             'message' => $request->input('message')

         ]);



             auth()->user()->notify(new Message($message));

             broadcast(new MessageSent($user, $message))->toOthers();

             return response(['status' => 'Message sent', 'message' => $message]);

     } */

    /**
     * Persist message to database
     *
     * @param Request $request
     * @return Response
     */

    public function sendMessage(Request $request, User $user)
    {

        //$user = $user->id;
        $input = $request->all();
        $input['user_to'] = $user->id;
        $message=auth()->user()->messages()->create($input);



        //auth()->user()->notify(new Message($message));

        broadcast(new PrivateMessageSent($message->load('user')))->toOthers();

        return response(['status' =>'Message sent', 'message' => $message, 'user']);

    }


    public function followings()
    {
        //return User::all();
        //$users = User::all()->except(Auth::id());
        //$users = User::get();
        //return User::all()->get();
        //return User::all()->except(Auth::id());
        //$users = Auth::user()->following;
        //return view ('chat',['users' => $users]);
        return Auth::user()->following;
    }

    public function fetchFollowers()
    {
        //return Auth::user()->following;
        return User::all();
    }


}

<?php

namespace App\Http\Controllers;

use App\Events\CommentsEvent;
use App\Notification;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Notifications\Notifiable;
use App\Notifications\NewComment;
use App\User;
use Illuminate\Support\Facades\Input;
use Session;
class CommentController extends Controller
{
    use Notifiable;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $comment = new Comment;
        $comment->comment = $request->input('comment');
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);
        $comments = Comment::where('commentable_id', $post->id )->first();
        $post = Post::where('id', $post->id)->first();

        if ($post->user_id != $comment->user_id) {
            $user = User::find($post->user_id);
            $user->notify(new NewComment($comment));
        }
        //dd($comment);
        return view('Post', ['comments' => $comments, 'post' => $post]);
    }



    public function fetchComments()
    {
        return Comment::with('user')->first();
    }


    public function editcomment($id)
    {
        $comment = Comment::where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->first();
        return view('EditComment', compact('comment'));
    }

    public function updatecomment(Request $request, $id)
    {
        //$user = Auth::user();
        $comment = Comment::find($id);


        $comment->comment = Input::get('comment');

        $this->validate($request, [
            'comment' => 'required|string',
        ]);

        $comment->save();


        Session::flash('flash_message', 'Comment has been updated');

        $post = Post::find($id);
        $comment = Comment::all();
        return redirect()->route('home');

    }

    public function destroycomment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        Session::flash('message', 'Comment has been deleted!');

        //$comment = Comment::all();
        return redirect()->route('home');
    }

}

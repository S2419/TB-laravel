@extends('layouts.main')

@section('content')
    @include('partials.Sidebar')
    <div id="main" class="container">
        <chat-messages :user="{{auth()->user()}}">
        </chat-messages>
        <!-- <div class="panel-footer">
              <message-form
                      :following="following"
                      ></message-form> -->
    </div>
<<<<<<< HEAD

=======
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
@endsection

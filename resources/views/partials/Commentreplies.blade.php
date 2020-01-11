<style>
    .display-comment{
        margin-left: 30px;
    }
</style>
@foreach($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply.add') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" id="reply" placeholder="Reply">
                <input type="hidden" name="post_id" value="{{ $post_id }}">
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('partials.Commentreplies', ['comments' => $comment->replies])
    </div>
@endforeach
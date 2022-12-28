<div>
    <label>
        <input wire:model="comment" type="text">
        <button wire:click="addComment({{ $postId}})" >Comment</button>
    </label>

    @foreach ($comments as $comment)
        <div>
            <header>
                <img class="avatar" src = {{$comment->userProfile->profile_image}} alt="Avatar">
                <p class="user_name">
                        {{$comment->userProfile->profile_name}}
            </header>
            <body>
                <p>
                    {{$comment->comment_text}}
                <p>
                    @if($comment->userProfile->user_id == auth()->user()->id)
                        <a href= "{{route("comments.edit", ["id" => $comment->id])}}">
                            <button>Edit comment</button>
                        </a>
                    @endif 
                @if($comment->Post->UserProfile->user_id == auth()->user()->id ||
                    $comment->userProfile->user_id == auth()->user()->id)
                    <form method="POST" action= "{{route("comments.destroy", ["id" => $comment->id])}}">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Delete comment</button>
                    </form> 
                @endif
                
        </div>
    @endforeach
</div>

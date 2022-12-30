<div>
    <label>
        <p>
            @error("comment") {{$message}} @enderror
        </p>
        <input wire:model="comment" type="text">
        <button wire:click="addComment({{ $postId}})" >Comment</button>
    </label>

    @foreach ($comments as $comment)
        <div>
            <header>
                <a href= "{{route("user_profiles.show", ["id" => $comment->userProfile->id])}}">
                    <img class="avatar" src = {{$comment->userProfile->profile_image}} alt="Avatar">
                </a>
                <p class="user_name">
                        {{$comment->userProfile->profile_name}}
            </header>
            <body>
                <p>
                    {{$comment->comment_text}}
                <p>
                    <a href= "{{route("comments.like", ["id" => $comment->id])}}">
                        <button>Like</button>
                    </a>
                <h2>
                    Likes: {{$commentsLike->where('likeable_type', "App\Models\Comment")
                        ->where("likeable_id", $comment->id)->count()}}
                </h2>                    
                <p>
                    @can('update_comment', [ $comment])
                        <a href= "{{route("comments.edit", ["id" => $comment->id])}}">
                            <button>Edit comment</button>
                        </a>
                    @endcan 
                @can('delete_comment', [ $comment])
                    <form method="POST" action= "{{route("comments.destroy", ["id" => $comment->id])}}">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Delete comment</button>
                    </form> 
                @endcan
            </body>          
        </div>
    @endforeach
</div>

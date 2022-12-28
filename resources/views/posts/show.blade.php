@extends("layouts.basic")

@section("title", "Explorer")

@section("content")
    <div>
        <header> 

            <img class="avatar" src = {{$post->userProfile->profile_image}} alt="Avatar">
            <p class="user_name">
                    {{$post->userProfile->profile_name}}
        </header>
        <body>
            <img class="post" src = {{$post->image}}>
            <p>
                {{$post->caption}}
            <div>
                @livewire('like-button', ["likeableId" => $post->id, "likeableType" => get_class($post)])
                
                @if ($post->userProfile->user_id == auth()->user()->id)
                    <a href= "{{route("posts.edit", ["id" => $post->id])}}">
                        <button>Edit caption</button>
                    </a>
                    <form method="POST" action= "{{route("posts.destroy", ["id" => $post->id])}}">
                        @csrf
                        @method("DELETE")

                        <button type="submit">Delete post</button>
                    </form>
                @endif
                <a href= "{{route("comments.create", ["postId" => $post->id])}}">
                    <button>Add comment</button>
                </a>
            </div>
       
            @foreach ($comments as $comment)
            <div>
                <header> 

                    <img class="avatar" src = {{$comment->userProfile->profile_image}} alt="Avatar">
                    <p class="user_name">
                            {{$comment->userProfile->profile_name}}
                </header>
                <body>
                    {{$comment->comment_text}}
                    <div>
                        @livewire('like-button', ["likeableId" => $comment->id, "likeableType" => get_class($comment)])
                        @if($comment->userProfile->user_id == auth()->user()->id)
                            <a href= "{{route("comments.edit", ["id" => $comment->id])}}">
                                <button>Edit comment</button>
                            </a>
                        @endif      
                        @if($post->UserProfile->user_id == auth()->user()->id ||
                            $comment->userProfile->user_id == auth()->user()->id)
                            <form method="POST" action= "{{route("comments.destroy", ["id" => $comment->id])}}">
                                @csrf
                                @method("DELETE")
        
                                <button type="submit">Delete comment</button>
                            </form> 
                        @endif
                    </div>
                </body>
            </div>
            @endforeach
        </body>   
    </div>
@endSection
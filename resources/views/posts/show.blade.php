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
                @if ($post->userProfile->user_id == auth()->user()->id)
                    <a href= "{{route("posts.edit", ["id" => $post->id])}}">
                        <button>Edit caption</button>
                    </a>
                    <a href= "{{route("posts.destroy", ["id" => $post->id])}}">
                        <button>Delete post</button>
                    </a>
                @endif
       
            @foreach ($comments as $comment)
            <div>
                <header> 

                    <img class="avatar" src = {{$comment->userProfile->profile_image}} alt="Avatar">
                    <p class="user_name">
                            {{$comment->userProfile->profile_name}}
                </header>
                <body>
                    {{$comment->comment_text}}
                </body>
            </div>
            @endforeach
        </body>   
    </div>


@endSection
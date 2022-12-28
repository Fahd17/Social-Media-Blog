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
                
            </div>
       
            @livewire('create-comment', ["postId" => $post->id])
        </body>   
    </div>
@endSection
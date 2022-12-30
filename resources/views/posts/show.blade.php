@extends("layouts.basic")

@section("title", "Explorer")

@section("content")
    <div>
        <header> 
            <a href= "{{route("user_profiles.show", ["id" => $post->userProfile->id])}}">
                <img class="avatar" src = {{$post->userProfile->profile_image}} alt="Avatar">
            </a>
            <p class="user_name">
                    {{$post->userProfile->profile_name}}
        </header>
        <body>
            <img class="post" src = {{$post->image}}>
            <p>
                {{$post->caption}}
                
            <div>
                @livewire('like-button', ["likeableId" => $post->id, "likeableType" => get_class($post)])
                <h2>
                    Views: {{$views->count()}}  
                </h2>
                @can('update_post', [ $post])
                
                    <a href= "{{route("posts.edit", ["id" => $post->id])}}">
                        <button>Edit caption</button>
                    </a>
                @endcan
                @can('delete_post', [ $post])
                    <form method="POST" action= "{{route("posts.destroy", ["id" => $post->id])}}">
                        @csrf
                        @method("DELETE")

                        <button type="submit">Delete post</button>
                    </form>
                @endcan
                
            </div>
       
            @livewire('create-comment', ["postId" => $post->id])
        </body>   
    </div>
@endSection
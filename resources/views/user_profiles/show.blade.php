@extends("layouts.basic")

@section("title", "Profile")

@section("content")

         
    <div>
        <header>   
            <img class="avatar" src = {{$userProfile->profile_image}} alt="Avatar">
            <p class="user_name">
                {{$userProfile->profile_name}}
        </header>
        <body>
            <p>
                {{$userProfile->bio}}
            <p> 
                @if ($userProfile->user_id == auth()->user()->id)
                    <a href= "{{route("user_profiles.edit", ["id" => $userProfile->id])}}">
                        <button>Edit profile</button>
                    </a>
                @endif          
        </body>       
    </div>
    <h2>
        Your posts:
    </h2>
    @foreach ($posts as $post)
        <div>
            <a href= "{{route("posts.show", ["id" => $post->id])}}">
                <img class="post" src = {{$post->image}}>
            </a>
            <p>
                {{$post->caption}}
        </div>
    @endforeach
    <h2>
        Your comments:
    </h2>
    @foreach ($comments as $comment)
        <div>
            <p>
                You commented:
            </p>
            {{$comment->comment_text}}
            <p>
                On the following post:
            </p>
            <a href= "{{route("posts.show", ["id" => $comment->Post->id])}}"><img 
                    class="post" src = {{$comment->Post->image}}></a>
        </div>
    @endforeach      
@endSection
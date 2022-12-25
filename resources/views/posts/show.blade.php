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
            <img src = {{$post->image}}>
            <p>
                {{$post->caption}}
       
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
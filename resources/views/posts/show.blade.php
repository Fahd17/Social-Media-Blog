@extends("layouts.basic")

@section("title", "Explorer")

@section("content")
    <div>
        <header> 
            <img class="avatar" src = {{$profiles->where('id',$post->user_profile_id)->first()->profile_image}} 
            alt="Avatar" style="width:50px">
            
            {{$profiles->where('id',$post->user_profile_id)->first()->profile_name}}
        </header>
        <body>
            <img src = {{$post->image}}>
            <p>
                {{$post->caption}}
       
            @foreach ($comments as $comment)
            <div>
                {{$comment->comment_text}}
            </div>
            @endforeach
        </body>   
    </div>


@endSection
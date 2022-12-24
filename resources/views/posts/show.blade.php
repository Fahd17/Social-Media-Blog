@extends("layouts.basic")

@section("title", "Explorer")

@section("content")
    <div>
        <header> 
            {{$profiles[$post->user_profile_id]->profile_name}}
        </header>
            <img src = {{$post->image}}>
        <p>
        {{$post->caption}}
       
        @foreach ($comments as $comment)
            <div>
                {{$comment->comment_text}}
            </div>
        @endforeach
            
    </div>


@endSection
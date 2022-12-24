@extends("layouts.basic")

@section("title", "Explorer")

@section("content")

   
        @foreach ($posts as $post)
         
                <div>
                    <header> 
                        {{$post->user_profile_id}}
                    </header>
                    <img src = {{$post->image}}>
                    <p>
                        {{$post->caption}}
                </div>
            
        @endforeach
   
   
@endSection
@extends("layouts.basic")

@section("title", "Explorer")

@section("content")

   
        @foreach ($posts as $post)
         
                <div>
                    <header> 
                        {{$profiles[$post->user_profile_id]->profile_name}}
                    </header>
                    <img src = {{$post->image}}>
                    <p>
                        {{$post->caption}}
                
                </div>
            
        @endforeach
   
   
@endSection
@extends("layouts.basic")

@section("title", "Explorer")

@section("content")

   
        @foreach ($posts as $post)
         
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
                
                </div>
            
        @endforeach
   
   
@endSection
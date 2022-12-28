@extends("layouts.basic")

@section("title", "Explorer")

@section("content")

<div>
   
        @foreach ($posts as $post)
         
                <div>
                        <header>   
                                <img class="avatar" src = {{$post->userProfile->profile_image}} alt="Avatar">
                                <p class="user_name">
                                        {{$post->userProfile->profile_name}}
                                
                        </header>
                        <body>
                                <a href= "{{route("posts.show", ["id" => $post->id])}}"><img 
                                        class="post" src = {{$post->image}}></a>
                                <p>
                                        {{$post->caption}}
                
                </div>
            
        @endforeach
        {{$posts->links('vendor.pagination.semantic-ui')}}

</div>
   
   
@endSection
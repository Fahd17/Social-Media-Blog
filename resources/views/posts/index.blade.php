@extends("layouts.basic")

@section("title", "Explorer")

@section("content")

<div>
   
        @foreach ($posts as $post)
         
                <div>
                        <header>
                                <a href= "{{route("user_profiles.show", ["id" => $post->userProfile->id])}}">   
                                        <img class="avatar" src = {{$post->userProfile->profile_image}} alt="Avatar">
                                </a>
                                <p class="user_name">
                                        {{$post->userProfile->profile_name}}
                                
                        </header>
                        <body>
                                <a href= "{{route("posts.show", ["id" => $post->id])}}"><img 
                                        class="post" src = {{$post->image}}></a>
                                <p>
                                        {{$post->caption}}
                        </body>
                
                </div>
            
        @endforeach
        {{$posts->links('vendor.pagination.semantic-ui')}}

</div>
   
   
@endSection
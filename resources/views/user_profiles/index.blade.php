@extends("layouts.basic")

@section("title", "Explorer")

@section("content")

<div>
   
        @foreach ($userProfiles as $userProfile)
         
                <div>
                    <header>   
                        <img class="avatar" src = {{$userProfile->profile_image}} alt="Avatar">
                        <p class="user_name">
                            {{$userProfile->profile_name}}
                                
                    </header>
                    <body>
                        <p>
                            {{$userProfile->bio}}        
                    </body>
        
                </div>
        @endforeach
    </div> 
@endSection
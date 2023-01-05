<!DOCTYPE html>
<nav>
    <a href= "{{route("user_profiles.show", ["id" =>  auth()->user()->UserProfile->id])}}">
        <button>My profile</button>
    </a>
    <a href= "{{route("posts.index")}}">
        <button>Explorer</button>
    </a>
    <a href= "{{route("user_profiles.index")}}">
        <button>Discover users</button>
    </a>
    <a href= "{{route("posts.create")}}">
        <button>New post</button>
    </a>
</nav>

<head>
    <title> Fistgram - @yield("title")</title>
    @livewireStyles
</head>
<style>
    div {
      border: 2px solid rgb(176, 171, 171);
      border-radius: 8px;
      padding: 5px;
    }
    p {
        font-size: 25px;
    }
    img.post {
        width: 620px;
        height: 480px;
    }
    img.avatar {
        border-radius: 50%;
        float: left;
        padding: 5px 10px 5px 10px;
        width:80px;
        height: 80px;
    }

    p.user_name {
        padding: 5px 10px 5px 10px;
        font-size: 40px;
    }
    input {
        background-color: white;
        color: black;
        border: 2px solid #000080;
        padding: 15px 32px;
    }
    button {
        background-color: #000080; 
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    
    </style>
<body> 
    @livewireScripts
    <h1> Fistgram - @yield("title")</h1>
    @if (Route::has('login'))
        <div>
            @auth
            @if ($errors->any())
                <div>
                    Errors:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                     </ul>
                </div>
            @endif
            @if (session("message"))
                <p><b> {{session("message") }} </b></p>
            @endif
            @yield("content")
     @else
        <a href="{{ route('login') }}">Log in</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
        @endif
            @endauth
        </div>
    @endif
</html>

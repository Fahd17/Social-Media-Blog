<!DOCTYPE html>
<head>
    <title> Fistgram - @yield("title")</title>
</head>
<style>
    div {
      border: 2px solid rgb(176, 171, 171);
      border-radius: 8px;
      padding: 5px;
    }
    img.avatar {
        border-radius: 50%;
        float: left;
        padding: 5px 10px 5px 10px;
        width:80px
    }
    p.user_name {
        padding: 5px 10px 5px 10px;
        font-size: 30px;
    }
    
    </style>
<body> 
    <h1> Fistgram - @yield("title")</h1>
    @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
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

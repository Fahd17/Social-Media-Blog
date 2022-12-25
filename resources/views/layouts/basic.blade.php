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
    @yield("content")
</html>

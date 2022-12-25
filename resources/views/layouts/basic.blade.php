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
    }
    </style>
<body> 
    <h1> Fistgram - @yield("title")</h1>
    @yield("content")
</html>

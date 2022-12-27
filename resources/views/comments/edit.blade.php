@extends("layouts.basic")

@section("title", "Edit a comment!")

@section("content")

    <form method="POST" action="{{route("comments.update", ['id' => $comment->id])}}">

        @csrf
        <p> Comment: <input type="text" name="comment" value="{{$comment->comment_text}}"></p>

        <input type="submit" value="Post" >
        <a href="{{ route("posts.show", ["id" => $comment->Post->id])}}"> Cancel</a>
    </form>
@endSection
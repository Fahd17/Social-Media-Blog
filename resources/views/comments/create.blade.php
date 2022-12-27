@extends("layouts.basic")

@section("title", "Add a comment!")

@section("content")

    <form method="POST" action="{{route("comments.store", ['postId' => $post->id])}}" >

        @csrf

        <p> Comment: <input type="text" name="comment" value="{{old("comment")}}"></p>

        <input type="submit" value="Post" >
        <a href="{{ route("posts.show", ['id' => $post->id])}}"> Cancel</a>
    </form>
@endSection
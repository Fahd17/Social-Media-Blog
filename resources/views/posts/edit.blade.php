@extends("layouts.basic")

@section("title", "Create a post!")

@section("content")

    <form method="POST" action="{{route("posts.update", ['id' => $post->id])}}">

        @csrf
        <p> Caption: <input type="text" name="caption" value="{{$post->caption}}"></p>

        <input type="submit" value="Post" >
        <a href="{{ route("posts.index")}}"> Cancel</a>
    </form>
@endSection
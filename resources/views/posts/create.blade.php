@extends("layouts.basic")

@section("title", "Create a post!")

@section("content")

    <form method="POST" action="{{route("posts.store")}}" enctype='multipart/form-data'>

        @csrf

        <p> 
            Upload your post image:
        </p>
        <input type="file" id="image" name="image">
        <p> Caption: <input type="text" name="caption" value="{{old("caption")}}"></p>

        <input type="submit" value="Post" >
        <a href="{{ route("posts.index")}}"> Cancel</a>
    </form>
@endSection
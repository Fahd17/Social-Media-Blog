@extends("layouts.basic")

@section("title", "Create your profile:")

@section("content")

    <form method="POST" action="{{route("user_profiles.store")}}" enctype='multipart/form-data'>

        @csrf

        <input type="file" id="profile_image" name="profile_image">
        <p> Profile name: <input type="text" name="profile_name" value="{{old("profile_name")}}"></p>
        <p> Bio: <input type="text" name="bio" value="{{old("bio")}}"></p>
        <p> Date of birth: <input type="date" id="date_of_birth" name="date_of_birth" value="{{old("date_of_birth")}}"></p>

        <input type="submit" value="Post" >
        <a href="{{ route("posts.index")}}"> Cancel</a>
    </form>
@endSection
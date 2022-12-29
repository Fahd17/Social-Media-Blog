@extends("layouts.basic")

@section("title", "Edit your profile.")

@section("content")

    <form method="POST" action="{{route("user_profiles.update", ['id' => $user_profile->id])}}" enctype='multipart/form-data'>

        @csrf
        <input type="file" id="image" name="image">
        <p> Profile name: <input type="text" name="profile_name" value="{{$user_profile->profile_name}}"></p>
        <p> Bio: <input type="text" name="bio" value="{{$user_profile->bio}}"></p>
        <input type="submit" value="Post" >
        <a href="{{ route("user_profiles.index")}}"> Cancel</a>
    </form>
@endSection
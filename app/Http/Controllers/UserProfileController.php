<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\Post;
use App\Models\Comment;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userProfiles = UserProfile::get();
        
        return view("user_profiles.index", ["userProfiles" => $userProfiles]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user_profiles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "profile_name" => "required|max:20|unique:user_profiles|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-]*$)/u",
            "bio" => "required|max:255",
            "date_of_birth" => "after_or_equal:01/01/2005 ",

        ]);
        

        if($request->hasFile("profile_image")) {
            $destination_path = "public/images/posts";
            $image = $request->file("profile_image");
            //naming the image according to user id, date and time
            $image_name = auth()->user()->id. date("Y-m-d") .date("h:i:sa");
            $path = $request->file("profile_image")->storeAs( $destination_path,$image_name);
        }

        $a = new UserProfile;
        $a->profile_name = $validatedData["profile_name"];
        $a->bio =  $validatedData["bio"];
        $a->profile_image = "/storage/images/posts/".$image_name;
        $a->date_of_birth = $validatedData["date_of_birth"];
        $a->user_id = auth()->user()->id;
        $a->save();

        session()->flash("message", "post was created.");

        return redirect()->route("user_profiles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userProfile = UserProfile::findOrFail($id);
        $posts = Post::where("user_profile_id", $id)->get();
        $comments = Comment::where("user_profile_id", $id)->get();
        return view("user_profiles.show", ["userProfile" => $userProfile,
                    "posts" => $posts, "comments" => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

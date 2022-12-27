<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\UserProfile;
use App\Models\Comment;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view("posts.index", ["posts" => $posts->reverse()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
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
            "caption" => "required|min:5"
        ]);

        if($request->hasFile("image")) {
            $destination_path = "public/images/posts";
            $image = $request->file("image");
            //naming the image according to user id, date and time
            $image_name = auth()->user()->id. date("Y-m-d") .date("h:i:sa");
            $path = $request->file("image")->storeAs( $destination_path,$image_name);
        }

        $p = new Post;
        $p->caption = $validatedData["caption"];
        $p->image = "/storage/images/posts/".$image_name;
        $p->user_profile_id = UserProfile::where("user_id", auth()->user()->id)
        ->first()->id;
        $p->save();

        session()->flash("message", "post was created.");

        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where("post_id", $id)->get();
        return view("posts.show", ["post" => $post,"comments" => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if(UserProfile::where("user_id", auth()->user()->id)
           ->first()->id==$post->user_profile_id){

            return view("posts.edit", ["post" => $post]);
        }else{
            session()->flash("message", "You are not authroized to update this item!");
            return redirect()->route("posts.show", ["id" => $post->id]);
        }
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
        $post = Post::findOrFail($id);
        $validatedData = $request->validate([
            "caption" => "required|min:5"
        ]);

        $post->update(["caption" => $validatedData["caption"]]);

        session()->flash("message", "Caption was updated.");

        return redirect()->route("posts.show", ["id" => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if(UserProfile::where("user_id", auth()->user()->id)
           ->first()->id==$post->user_profile_id){

            $post->delete();
        }else{
            session()->flash("message", "You are not authroized to delete this post!");
        }
        return redirect()->route("posts.index");

    }
}

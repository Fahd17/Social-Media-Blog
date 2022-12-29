<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\UserProfile;
use App\Models\Comment;
use App\Models\Like;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($postId)
    {
        $post = Post::findOrFail($postId);
        return view("comments.create", ["post" => $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        $validatedData = $request->validate([
            "comment" => "required|max:255"
        ]);

        $c = new Comment;
        $c->comment_text = $validatedData["comment"];
        $c->user_profile_id = UserProfile::where("user_id", 
        auth()->user()->id)->first()->id;
        $c->post_id = $postId;
        $c->save();

        return redirect()->route("posts.show", ["id" => $postId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        if(UserProfile::where("user_id", auth()->user()->id)
           ->first()->id == $comment->user_profile_id){

            return view("comments.edit", ["comment" => $comment]);
        }else{
            session()->flash("message", "You are not authroized to update this item!");
            return redirect()->route("posts.show", ["id" => $comment->Post->id]);
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
        $comment = Comment::findOrFail($id);
        $validatedData = $request->validate([
            "comment" => "required|max:255"
        ]);

        $comment->update(["comment_text" => $validatedData["comment"]]);

        session()->flash("message", "Comment was updated.");

        return redirect()->route("posts.show", ["id" => $comment->Post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $currentUserId = UserProfile::where("user_id", auth()->user()->id)->first()->id;
        if($currentUserId == $comment->user_profile_id || 
           $currentUserId == $comment->Post->UserProfile->id){

            $comment->delete();
        }else{
            session()->flash("message", "You are not authroized to delete this comment!");
        }
        return redirect()->route("posts.show", $comment->Post->id);
    }

    /**
     * Likes the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function like($id)
    {
        $comment = Comment::findOrFail($id);
        if(!Like::where("likeable_id", $id)->where("user_profile_id",
            auth()->user()->UserProfile->id)->exists()){
                
            $like = new Like;
            $like -> user_profile_id = auth()->user()->UserProfile->id;
            $like -> likeable_id = $id;
            $like -> likeable_type = "App\Models\Comment";
            $like -> save();

        }else{
            session()->flash("message", "You already liked this comment!");
        }
        return redirect()->route("posts.show", $comment->Post->id);
    }
}

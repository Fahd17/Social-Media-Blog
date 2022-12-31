<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\UserProfile;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        
        return view("posts.index", ["posts" => $posts]);

        
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
        if(!UserProfile::where("user_id", auth()->user()->id)->exists()){

            return redirect()->route('user_profiles.create');
        }else{
            $post = Post::findOrFail($id);
            $comments = Comment::where("post_id", $id)->get();
            $postsLike = Like::get();
            if(!DB::table("post_user_profile")->where("post_id", $id)->where("user_profile_id",
            auth()->user()->UserProfile->id)->exists()){
                UserProfile::where("user_id", auth()->user()->id)
                ->first()->viewedPosts()->attach($id);
            }
            $views = DB::table("post_user_profile")->where("post_id", $id)->get();
            return view("posts.show", ["post" => $post,"comments" => $comments->reverse(), "views" => $views,
              "postsLike" => $postsLike]);
        }
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
        if((Gate::allows('update_post', [$post]))){

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

       
        if((Gate::allows('delete_post', [$post]))){

            $post->delete();
        }else{
            session()->flash("message", "You are not authroized to delete this post!");
        }
        return redirect()->route("posts.index");

    }

    /**
     * Likes the specified resource from storage.
     *
     * @param  int  $id
     */
    public function like($id)
    {
        $post = Post::findOrFail($id);
        if(!Like::where("likeable_id", $id)->where("user_profile_id",
            auth()->user()->UserProfile->id)->exists()){
                
            $like = new Like;
            $like -> user_profile_id = auth()->user()->UserProfile->id;
            $like -> likeable_id = $id;
            $like -> likeable_type = "App\Models\Post";
            $like -> save();
            return redirect()->route("send_like", ["likeableType" => 'AppModelsPost', "likeableId" => $id]);

        }else{
            session()->flash("message", "You already liked this post!");
            return redirect()->route("posts.show", $post->id);
        }
        
    }

    
}

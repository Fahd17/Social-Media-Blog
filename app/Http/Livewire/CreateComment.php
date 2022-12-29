<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Like;

class CreateComment extends Component
{
    public $postId;
    public $comment;
    public $commentId;

    

    public function mount($postId){
        $this->postId = $postId;
    }

    public function addComment($postId){

        $validatedData = $this->validate([
            "comment" => "required|max:255"
        ]);

        $c = new Comment;
        $c->comment_text = $validatedData["comment"];
        $c->user_profile_id = auth()->user()->UserProfile->id;
        $c->post_id = $postId;
        $c->save();

    }


    public function render()
    {
        $comments = Comment::where("post_id", $this->postId)->get();
        $commentslikes = Like::get();
        return view('livewire.create-comment', [ "comments" => $comments->reverse(),
         "commentsLike" => $commentslikes]);
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CreateComment extends Component
{
    public $postId;
    public $comment;

    

    public function mount($postId){
        $this->postId = $postId;
    }

    public function addComment($postId){
        $c = new Comment;
        $c->comment_text = $this->comment;
        $c->user_profile_id = auth()->user()->UserProfile->id;
        $c->post_id = $postId;
        $c->save();

    }


    public function render()
    {
        $comments = Comment::where("post_id", $this->postId)->get();
        return view('livewire.create-comment', [ "comments" => $comments->reverse()]);
    }
}

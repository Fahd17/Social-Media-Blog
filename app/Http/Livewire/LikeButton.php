<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;

class LikeButton extends Component
{
    public $likeableId = 0;
    public $likeableType = 0;
    public $count = 0;

    public function mount($likeableId, $likeableType){
        $this->count = Like::where("likeable_id", $likeableId)
        ->where("likeable_type", $likeableType)->get()->count();
    }


    public function like($likeableId, $likeableType){

        if(!Like::where("likeable_id", $likeableId)->where("user_profile_id",
            auth()->user()->UserProfile->id)->exists()){
                
            $like = new Like;
            $like -> user_profile_id = auth()->user()->UserProfile->id;
            $like -> likeable_id = $likeableId;
            if($likeableType == "AppModelsPost"){
               $like -> likeable_type = "App\Models\Post";
               $like -> save();
                $this->count = Like::where("likeable_id", $likeableId)
                ->where("likeable_type", "App\Models\Post")->get()->count();
            } else {
                $like -> likeable_type = "App\Models\Comment";
                $like -> save();
                $this->count = Like::where("likeable_id", $likeableId)
                ->where("likeable_type", "App\Models\Comment")->get()->count();
            }
        }
    }



    public function render()
    {
        return view('livewire.like-button');
    }
}

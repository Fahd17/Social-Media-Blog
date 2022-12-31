<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReceivedLike;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;
use App\Models\UserProfile;

class ReceivedLikeController extends Controller
{
    public function sendLikeNotification($likeableType, $likeableId){

        
        if($likeableType == 'AppModelsPost'){
            $post = Post::Find($likeableId);
            $user = $post->UserProfile->User;
            $likeDate = [
                'body' =>    auth()->user()->UserProfile->profile_name." like you post!",
                'likeText' =>  'View the post:',
                'url' =>    url('/posts/'.$likeableId),
                'ending' =>  'Thank you!',
            ];
            Notification::send($user, new ReceivedLike($likeDate));
            return redirect()->route("posts.show", $post->id);

        }else {
            $comment = Comment::Find($likeableId);
            $user = $comment->UserProfile->User;
            $likeDate = [
                'body' =>    auth()->user()->UserProfile->profile_name." like you comment!",
                'likeText' =>  'View the comment:',
                'url' =>    url('/posts/'.$comment->Post->id),
                'ending' =>  'Thank you!',
            ];
            Notification::send($user, new ReceivedLike($likeDate));
            return redirect()->route("posts.show", $comment->Post->id);
        }

        
    }
}

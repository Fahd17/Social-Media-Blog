<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Post;
use App\Models\UserProfile;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('delete_post', function(User $user, Post $post){

            return ($user->is_admin || ($post->UserProfile->user_id == $user->id)) ;
        });

        Gate::define('update_post', function(User $user, Post $post){

            return ($user->is_admin || ($post->UserProfile->user_id == $user->id)) ;
        });

        Gate::define('update_comment', function(User $user, Comment $comment){

            return ($user->is_admin || ($comment->UserProfile->user_id == $user->id)) ;
        });

        Gate::define('delete_comment', function(User $user, Comment $comment){

            return ($user->is_admin || ($comment->UserProfile->user_id == $user->id)) ;
        });
        
        
    }
}

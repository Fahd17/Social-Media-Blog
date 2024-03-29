<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = ['profile_name', 'bio', 'profile_image'];

   public function user()
   {
        return $this->belongsTo(User::class);
   }

   public function posts()
   {
        return $this->hasMany(Post::class);
   }

   public function comments()
   {
        return $this->hasMany(Comment::class);
   }

   public function likes()
   {
        return $this->hasMany(Like::class);
   }

   public function postsThatBeenCommented()
   {
        return $this->hasManyThrough(Post::class, Comment::class);
   }

   public function viewedPosts()
   {

       return $this->belongsToMany(Post::class);
   }
    
}

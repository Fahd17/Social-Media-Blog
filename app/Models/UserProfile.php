<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

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

   public function postsThatBeenCommented()
   {
        return $this->hasManyThrough(Post::class, Comment::class);
   }
    
}

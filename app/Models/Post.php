<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class);
    }

    public function comments()
   {
        return $this->hasMany(Comment::class);
   }

   public function userProfilesThatHaveCommented()
   {
        return $this->hasManyThrough(UserProfile::class, Comment::class);
   }
}

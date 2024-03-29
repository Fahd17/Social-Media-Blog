<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['caption'];
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

   public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }

    public function userProfilesViewedThis()
    {

        return $this->belongsToMany(UserProfile::class);
    }
}

<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;

class Post extends Model
{
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function addComment($body)
	{
		$this->comments()->create(compact('body'));
	}

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function likes()
    {
    	return $this->morphToMany('App\User', 'likeable')->whereDeletedAt(null);
    }

    public function getIsLikedAttribute()
    {
    	$like = $this->likes()->whereUserId(Auth::User()->id)->first();

    	return (!is_null($like)) ? true : false;
    }

}

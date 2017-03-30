<?php

namespace App;

class Comment extends Model
{

	public function reply()
	{
		return $this->hasMany(Reply::class);
	}

    public function post() {
    	return $this->belongsTo(Post::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }
}

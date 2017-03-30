<?php

namespace App;

use App\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasmany(Post::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);
    }

    public function likedPosts()
    {
        return $this->morphedByMany('App\Post', 'likeable')->whereDeletedAt(null);
    }

    public function friendsOfMine()
    {
        return $this->belongsToMany('App\User', 'friendships', 'user_id', 'friend_id');
    }

    public function friendOf()
    {
        return $this->belongsToMany('App\User', 'friendships', 'friend_id', 'user_id');
    }

    public function friends1()
    {
        return $this->friendsOfMine()->wherePivot('accepted', 1);

        //merge($this->friendOf()->wherePivot('accepted', 1));
    }

    public function friends2()
    {
        return $this->friendOf()->wherePivot('accepted', 1);

        //merge($this->friendOf()->wherePivot('accepted', 1));
    }



    
}

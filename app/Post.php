<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;
use App\Comment;

class Post extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'user_name' => 'required',
        'body' =>'required',
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function like_users()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }
}

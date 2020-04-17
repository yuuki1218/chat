<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Comment extends Model
{
    protected $guarded = array('id');
    
    
    public function posts()
    {
        return $this->belongsTo('App\Post');
    }
}

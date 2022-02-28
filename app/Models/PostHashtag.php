<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostHashtag extends Model
{
    use HasFactory;

    protected $table = "post_hashtag";

    protected $fillable = [
        'id', 'post_id', 'hashtag_id'
    ];

    public function post(){
        return $this->belongsTo('App\Post' , 'post_id');
    }

    public function hashtag(){
        return $this->belongsTo('App\Hashtag' , 'hashtag_id');
    }
}

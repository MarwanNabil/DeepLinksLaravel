<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;

    protected $table = 'hashtags';

    protected $fillable = [
        'id', 'name', 'description', 'color'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}

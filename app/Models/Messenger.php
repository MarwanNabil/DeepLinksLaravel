<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'id',
        'sender_id',
        'receiver_id',
        'text',
        'appendix'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function sender()
    {
        return $this->belongsTo('App\Models\User', 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo('App\Models\User', 'receiver_id');
    }

}

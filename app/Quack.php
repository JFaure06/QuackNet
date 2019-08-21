<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quack extends Model
{
    protected $fillable = [
        'message', 'photo', 'tags', 'user_id'
    ];

    // un quack appartient à un duck
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comment(){
        return $this->hasMany('App\Comment');
    }
}

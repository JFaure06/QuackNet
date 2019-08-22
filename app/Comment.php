<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function quack()
    {
        // un comment appartient à un quack
        return $this->belongsTo('App\Quack');
    }

    public function user()
    {
        // un comment appartient à un duck
        return $this->belongsTo('App\User');
    }
}

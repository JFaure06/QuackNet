<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quack extends Model
{
    // un quack appartient à un duck
    public function user(){
        return $this->belongsTo('App\User');
    }
}

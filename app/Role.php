<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {
        // un role peut avoir plusieurs user
        return $this->hasmany('App\User');
    }
}

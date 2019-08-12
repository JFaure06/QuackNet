<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Quack
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quack query()
 * @mixin \Eloquent
 */
class Quack extends Model
{
    const CREATED_AT = 'creation_date';
}

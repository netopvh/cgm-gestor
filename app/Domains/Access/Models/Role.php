<?php

namespace App\Domains\Access\Models;

use Laratrust\Models\LaratrustRole;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Role extends LaratrustRole implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','display_name','description'];
}


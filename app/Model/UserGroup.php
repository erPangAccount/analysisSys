<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_name'
    ];
}

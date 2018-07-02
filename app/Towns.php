<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Towns extends Model
{

    protected $table = 'towns';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}

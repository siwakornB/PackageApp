<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    protected $fillable = [
        'Package_Id', 'path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
}

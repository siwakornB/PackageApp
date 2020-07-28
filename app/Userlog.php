<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userlog extends Model
{
    /*$table->string('log_name');
        $table->text('description')->nullable();
        $table->unsignedBigInteger('subject_id')->nullable();
        $table->string('subject_role')->nullable();*/

        protected $fillable = [
            'log_name', 'description','subject_id','subject_role'
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

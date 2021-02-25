<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    protected $fillable = [
        'app_id','user_id'
    ];

    public $timestamps = false;
}

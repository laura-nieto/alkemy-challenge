<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{

    protected $fillable = [
        'image','price','description'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function users()
    {
        return $this->belongsToMany('App\User','users_apps')->withTimestamps();
    }
}

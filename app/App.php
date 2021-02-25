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

    public function buyer()
    {
        return $this->belongsToMany('App\User','shops');
    }
    public function developer()
    {
        return $this->belongsToMany('App\User','app_dev');
    }
}

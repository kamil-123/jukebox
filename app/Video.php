<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;

class Video extends Model
{
    public function author(){
        // return $this->belongsTo('App\Author');
        // return $this->belongsTo(\App\Author::class); //possible ways do the same
        return $this->belongsTo(Auhor::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
}

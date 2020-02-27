<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function videos(){
        return $this->belongsToMany(Video::class);
    }
    public function authors(){
        return $this->belongsToMany(Author::class);
    }
}

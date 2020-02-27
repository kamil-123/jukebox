<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Video;

class Author extends Model
{
    public function videos(){
        return $this->hasMany(Video::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class);
        // return $this->belongsToMany(Genre::class, 'author_genre', 'author_id', 'genre_id'); // define the relationship if named differently
    }
}

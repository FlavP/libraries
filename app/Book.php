<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'description',
        'author',
        'cover'
    ];

    public function authors(){
        return $this->belongsToMany(Author::class, 'author_books');
    }
}

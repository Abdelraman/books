<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function getNameAttribute($value)
    {
        return ucwords($value);

    }//end of get name attribute

    public function translators()
    {
        return $this->belongsToMany(User::class, 'translator_book', 'book_id', 'translator_id');

    }//end of translators


}//end of model

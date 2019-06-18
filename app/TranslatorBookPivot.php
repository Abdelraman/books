<?php

namespace App;


use Illuminate\Database\Eloquent\Relations\Pivot;

class TranslatorBookPivot extends Pivot
{
    protected $table = 'translator_book';

    protected $casts = [
        'languages' => 'array'
    ];

}//end of model

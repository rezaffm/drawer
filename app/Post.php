<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['locale', 'title', 'content'];

    protected $fillable = ['author'];
}

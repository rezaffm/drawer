<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['locale', 'title', 'content'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

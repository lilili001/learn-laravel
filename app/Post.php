<?php

namespace App;

use App\Events\PostWasPublished;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','body'];
    protected $dispatchesEvents = [
        'created' => PostWasPublished::class
    ];
}

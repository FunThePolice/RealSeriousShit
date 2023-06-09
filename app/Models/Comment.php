<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;
 protected $fillable = ['title', 'body'];

 public function commentable(): MorphTo
{
    return $this->morphTo();
}

 public function replies(): MorphMany
 {
    return $this->morphMany(Comment::class,'commentable');
 }

 public function images(): MorphMany
 {
    return $this->morphMany(Image::class,'imageable');
 }
}

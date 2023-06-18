<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Image extends Model
{
    use HasFactory;
 protected $fillable = ['name'];

 public function imageable(): MorphTo
 {
    return $this->morphTo();
 }

 public function tags(): MorphToMany
 {
   return $this->morphToMany(Tag::class, 'taggable');
 }
 
}

 

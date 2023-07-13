<?php

namespace App\Services;
use App\Models\Tag;
use Illuminate\Validation\Rules\Exists;

class TagService {
    
    public function create($tagData,$tagParent)
    {
        if ($tagData->filled('tag_name')){
        $tag = new Tag;
        $tag->tag_name = $tagData->tag_name;
        return $tagParent->tags()->save($tag);
        }
    }

    public function get($tagParent)
    {
        foreach ($tagParent->tags as $tag) {
            return $tag;
        }
    }
    
    public function update($tagData,$tagParent)
    {
        $tag = $this->get($tagParent);
        if ($tag != null){
        $tag->update($tagData->all());
        return ;
        }
        else if ($tagData->filled('tag_name')) {
           return $this->create($tagData,$tagParent);
        }
    }
} 
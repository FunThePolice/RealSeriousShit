<?php

namespace App\Services;
use App\Models\Image;
use Illuminate\Support\Facades\File;

class ImageService {

    public function store($imageData,$imageParent)
    {
        if ($imageData->hasFile('image')){
        $image = new Image;
        $imageData->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $imageName = time().'.'.$imageData->image->extension();
        $imageData->image->move(public_path('storage'), $imageName);
        $image->name = $imageName;
        return $imageParent->images()->save($image);
        }
    }

    public function get($imageParent)
    {
        foreach ($imageParent->images as $image) {
            return $image;
        }
    }

    public function update($imageData,$imageParent)
    {
        $image = $this->get($imageParent);
        if ($image != null){
            unlink(public_path().'/storage/' . $image->name);
            $imageData->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $imageName = time().'.'.$imageData->image->extension();
            $imageData->image->move(public_path('storage'), $imageName);
            $image->name = $imageName;
            $image->update($imageData->all());
            return ;
        }
        else {
            return $this->store($imageData,$imageParent);
        }
    }

    public function delete($imageParent)
    {
        $image = $this->get($imageParent);
        $image->unlink(public_path().'/storage/' . $image->name);
        $imageParent->images()->delete();
        return ;
    }
}

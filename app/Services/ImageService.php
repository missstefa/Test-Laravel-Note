<?php

namespace App\Services;


use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageService
{
    public function storeImage(Request $request)
    {
        $image =  $request->file('image');

        if ($image) {
            $path = $image->store('public');
            return substr($path, strlen('public'));
        }
        return null;
    }

    public function deleteImage(Note $note)
    {
        File::delete(public_path('storage' . $note->image));
    }


}
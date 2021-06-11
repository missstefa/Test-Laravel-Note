<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class NoteStoreRequest extends NoteUpdateRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge_recursive(parent::rules(), [
            'title' => ['required', 'string', 'max:50'],
            'body' => ['string'],
            'article_id' => ['string'],
            'is_important' => ['bool'],
            'image' => ['image'],
        ]);
    }

}

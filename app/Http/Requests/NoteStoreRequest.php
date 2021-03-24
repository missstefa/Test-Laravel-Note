<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class NoteStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:50'],
            'body' => ['string'],
            'article_id' => ['string'],
            'is_important' => ['bool'],
            'image' => ['image'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(
            [
                'is_important' => $this->prepareImportant(),
            ]
        );
    }

    public function prepareImportant()
    {
        if ($this->is_important == 'on') {
            return true;
        }
        return false;
    }
}

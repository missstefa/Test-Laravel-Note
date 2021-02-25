<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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

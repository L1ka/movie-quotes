<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'quote.*' => ['required','unique_translation:quotes'],
            'thumbnail' => ['required', 'image'],
            'movie_id' => ['required'],
        ];
    }
}

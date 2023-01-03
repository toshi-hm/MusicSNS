<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "search.music_name" => "string|max:50",
            "search.genre" => "string|max:30",
            "search.user_name" => "string|max:50",
        ];
    }
}

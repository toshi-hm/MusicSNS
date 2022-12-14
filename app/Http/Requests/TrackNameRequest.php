<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackNameRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "track_name" => "required|string|max:80",
            "track_id" => "required|string|max:50",
            "artist_genre" => "required|string|max:20",
        ];
    }
}

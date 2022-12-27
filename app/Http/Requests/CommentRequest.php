<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "comment.music_name" => "required|string|max:80",
            "comment.music_id" => "required|string|max:50",
            "comment.title" => "required|string|max:50",
            "comment.body" => "required|string|max:240",
        ];
    }
}

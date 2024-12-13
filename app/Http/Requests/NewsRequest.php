<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required','max:100'],
            'description' => ['required','max:255'],
            'text' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

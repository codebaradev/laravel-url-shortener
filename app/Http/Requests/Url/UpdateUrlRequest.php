<?php

namespace App\Http\Requests\Url;

use App\Services\UrlService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUrlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['max:255'],
            "link" => ['required', 'max:255', 'url'],
            "short" => [
                'required',
                'max:255',
                'regex:/^[a-zA-Z0-9-]+$/',
                Rule::unique('urls', 'short')->ignore($this->route('id'))
            ],
        ];
    }

    public function messages()
    {
        return [
            'short' => [
                'regex' => "the short url must be letters, numbers, and underscores",
            ]
        ];
    }
}

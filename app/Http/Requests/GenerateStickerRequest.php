<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateStickerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Authorization is handled by middleware
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'subject' => ['required', 'string', 'max:255'],
            'religious_figure' => ['required_if:type,religious', 'string', 'max:255'],
            'expression' => ['required', 'string', 'max:255'],
            'size' => ['required', 'string', 'in:small,medium,large'],
            'style' => ['required', 'string', 'in:cartoon,realistic,minimalist,pixel-art'],
            'country' => ['nullable', 'string', 'max:2'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'religious_figure.required_if' => 'The religious figure field is required for religious stickers.',
            'size.in' => 'The selected size must be small, medium, or large.',
            'style.in' => 'The selected style must be cartoon, realistic, minimalist, or pixel-art.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateStickerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject' => ['required', 'string', 'max:255'],
            'expression' => ['required', 'string', 'in:hype,tilted,gg,sadge,clutch,pog,facepalm,monkas,ez,nope,sleepy,blush,surprise,laugh,determined'],
            'size' => ['sometimes', 'string', 'in:1024x1024,512x512'],
            'style' => ['sometimes', 'string', 'in:default,cartoon,realistic'],
            'custom_style' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'subject.required' => 'Please enter a subject for your sticker',
            'expression.required' => 'Please select an expression',
            'expression.in' => 'Invalid expression selected',
            'size.in' => 'Invalid size selected',
            'style.in' => 'Invalid style selected',
            'custom_style.max' => 'Custom style description must be less than 500 characters',
        ];
    }
}

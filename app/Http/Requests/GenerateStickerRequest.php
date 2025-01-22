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
            'subject' => 'required|string|min:2|max:100',
            'expression' => 'required|string|in:hype,tilted,gg,sadge,clutch,pog,facepalm,monkas,ez,nope,sleepy,blush,surprise,laugh,determined',
            'size' => 'sometimes|string|in:1024x1024,512x512',
            'style' => 'sometimes|string|in:default,cartoon,realistic',
            'custom_style' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'expression.in' => 'The selected expression must be one of: hype, tilted, gg, sadge, clutch, pog, facepalm, monkas, ez, nope, sleepy, blush, surprise, laugh, determined',
            'custom_style.max' => 'The custom style description cannot be longer than 255 characters.',
        ];
    }
}

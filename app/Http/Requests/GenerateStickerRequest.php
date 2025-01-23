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
            'size' => ['sometimes', 'string', 'in:square_hd,square,portrait_4_3,portrait_16_9,landscape_4_3,landscape_16_9'],
            'style' => ['sometimes', 'string', 'in:realistic_image,digital_illustration,vector_illustration'],
            'colors' => ['nullable', 'array'],
            'colors.*.r' => ['required_with:colors', 'integer', 'between:0,255'],
            'colors.*.g' => ['required_with:colors', 'integer', 'between:0,255'],
            'colors.*.b' => ['required_with:colors', 'integer', 'between:0,255'],
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
            'colors.*.r.between' => 'Red value must be between 0 and 255',
            'colors.*.g.between' => 'Green value must be between 0 and 255',
            'colors.*.b.between' => 'Blue value must be between 0 and 255',
            'custom_style.max' => 'Custom style description must be less than 500 characters',
        ];
    }
}

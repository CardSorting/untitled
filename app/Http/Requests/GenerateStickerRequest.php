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
            'subject' => [
                'required', 
                'string', 
                'in:cat,dog,bunny,hamster,parrot,guinea-pig,bear,fox,wolf,owl,penguin,panda,shark,lion,tiger,elephant,dragon,unicorn,phoenix,griffin,mermaid,pegasus,robot,alien,ninja,pirate,astronaut,wizard,basketball-player,soccer-player,baseball-player,hockey-player,cricket-player,volleyball-player,tennis-player,gymnast,swimmer,track-athlete,skater,golfer,boxer,wrestler,martial-artist,fencer,judoka,pro-gamer,streamer,team-captain,coach,tournament-player,doctor,nurse,surgeon,pharmacist,dentist,paramedic,veterinarian,therapist,programmer,designer,data-scientist,sysadmin,game-dev,cybersecurity,devops,qa-engineer'
            ],
            'expression' => [
                'required', 
                'string', 
                'in:hype,tilted,gg,sadge,clutch,pog,facepalm,monkas,ez,nope,sleepy,blush,surprise,laugh,determined'
            ],
            'size' => [
                'sometimes', 
                'string', 
                'in:square_hd,square,portrait_4_3,portrait_16_9,landscape_4_3,landscape_16_9'
            ],
            'style' => [
                'sometimes', 
                'string', 
                'in:realistic_image,digital_illustration,vector_illustration'
            ],
            'custom_style' => [
                'nullable',
                'string',
                'in:with a small red mushroom cap,wearing a wizard hat and carrying a magic staff,wearing gaming headphones and holding a controller,in cyberpunk style with neon accents,in pixel art style,wearing a crown and royal cape,with rainbow sparkles and stars,in chibi anime style,with superhero cape and mask'
            ],
            'country' => [
                'nullable',
                'string',
                'size:2'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'subject.required' => 'Please select a character for your sticker',
            'subject.in' => 'Please select a valid character from the list',
            'expression.required' => 'Please select an expression',
            'expression.in' => 'Invalid expression selected',
            'size.in' => 'Invalid size selected',
            'style.in' => 'Invalid style selected',
            'custom_style.in' => 'Please select a valid style theme',
            'country.size' => 'Country code must be 2 characters',
        ];
    }
}

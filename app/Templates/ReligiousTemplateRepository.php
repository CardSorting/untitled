<?php

namespace App\Templates;

use App\Contracts\Templates\ReligiousTemplateInterface;

class ReligiousTemplateRepository implements ReligiousTemplateInterface
{
    public function getSubjects(): array
    {
        return [
            'religious_figure',
            'religious_symbol',
            'sacred_place',
            'ritual_item',
            'religious_text',
        ];
    }

    public function getCategories(): array
    {
        return [
            'abrahamic' => ['christianity', 'islam', 'judaism'],
            'dharmic' => ['hinduism', 'buddhism', 'sikhism', 'jainism'],
            'other' => ['taoism', 'shinto', 'indigenous'],
        ];
    }

    public function getExpressions(): array
    {
        return [
            'praying',
            'meditating',
            'blessing',
            'teaching',
            'worshipping',
        ];
    }

    public function getReligiousFigures(): array
    {
        return [
            'prophet',
            'saint',
            'guru',
            'monk',
            'priest',
            'spiritual_leader',
        ];
    }

    public function getReligiousSymbols(): array
    {
        return [
            'cross',
            'crescent',
            'star_of_david',
            'om_symbol',
            'dharma_wheel',
            'yin_yang',
        ];
    }

    public function getReligiousCategories(): array
    {
        return [
            'sacred_texts',
            'religious_places',
            'ceremonies',
            'religious_artifacts',
            'religious_symbols',
        ];
    }
}

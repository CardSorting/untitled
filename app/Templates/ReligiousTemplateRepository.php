<?php

namespace App\Templates;

use App\Contracts\Templates\ReligiousTemplateInterface;

class ReligiousTemplateRepository implements ReligiousTemplateInterface
{
    protected array $religionTemplates = [
        'christianity' => [
            'figures' => ['Jesus', 'Mary', 'Joseph', 'Moses', 'Abraham'],
            'symbols' => ['Cross', 'Fish', 'Dove', 'Chalice']
        ],
        'islam' => [
            'figures' => ['Muhammad', 'Ibrahim', 'Musa', 'Isa'],
            'symbols' => ['Crescent Moon', 'Star', 'Mosque']
        ],
        'buddhism' => [
            'figures' => ['Buddha', 'Dalai Lama'],
            'symbols' => ['Dharma Wheel', 'Lotus', 'Buddha statue']
        ],
        'hinduism' => [
            'figures' => ['Krishna', 'Ganesha', 'Shiva', 'Vishnu'],
            'symbols' => ['Om', 'Lotus', 'Swastika']
        ],
        'judaism' => [
            'figures' => ['Moses', 'Abraham', 'David', 'Solomon'],
            'symbols' => ['Star of David', 'Menorah', 'Torah scroll']
        ]
    ];

    public function getReligiousFigures(): array
    {
        $figures = [];
        foreach ($this->religionTemplates as $religion) {
            $figures = array_merge($figures, $religion['figures']);
        }
        return array_unique($figures);
    }

    public function getReligiousSymbols(): array
    {
        $symbols = [];
        foreach ($this->religionTemplates as $religion) {
            $symbols = array_merge($symbols, $religion['symbols']);
        }
        return array_unique($symbols);
    }

    public function isValidReligiousFigure(string $figure): bool
    {
        foreach ($this->religionTemplates as $religion) {
            if (in_array($figure, $religion['figures'])) {
                return true;
            }
        }
        return false;
    }

    public function getAll(): array
    {
        return $this->religionTemplates;
    }

    public function validateSubject(string $subject): bool
    {
        // Any subject is valid for religious stickers as long as it's not empty
        return !empty(trim($subject));
    }

    public function getSuggestedSubjects(): array
    {
        return [
            'Praying',
            'Meditating',
            'Teaching',
            'Blessing',
            'Preaching',
            'Healing',
            'Worshipping'
        ];
    }
}

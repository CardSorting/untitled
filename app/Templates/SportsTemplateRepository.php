<?php

namespace App\Templates;

use App\Contracts\Templates\SportsTemplateInterface;

class SportsTemplateRepository implements SportsTemplateInterface
{
    public function getSubjects(): array
    {
        return [
            'athlete',
            'team',
            'sports_equipment',
            'stadium',
            'trophy',
        ];
    }

    public function getCategories(): array
    {
        return [
            'team_sports' => ['football', 'basketball', 'baseball', 'soccer', 'hockey'],
            'individual_sports' => ['tennis', 'golf', 'boxing', 'swimming', 'athletics'],
            'equipment' => ['ball', 'racket', 'bat', 'glove', 'helmet'],
        ];
    }

    public function getExpressions(): array
    {
        return [
            'celebrating',
            'competing',
            'training',
            'winning',
            'teamwork',
        ];
    }

    public function getSportsCategories(): array
    {
        return [
            'team_sports',
            'individual_sports',
            'olympic_sports',
            'extreme_sports',
            'traditional_sports',
        ];
    }

    public function getAthleteTypes(): array
    {
        return [
            'professional',
            'amateur',
            'olympian',
            'collegiate',
            'youth',
        ];
    }
}

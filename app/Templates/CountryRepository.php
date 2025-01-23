<?php

namespace App\Templates;

class CountryRepository
{
    public function getCountries(): array
    {
        return [
            'af' => 'Afghanistan',
            'ar' => 'Argentina',
            'au' => 'Australia',
            'br' => 'Brazil',
            'ca' => 'Canada',
            'cn' => 'China',
            'de' => 'Germany',
            'es' => 'Spain',
            'fr' => 'France',
            'gb' => 'United Kingdom',
            'in' => 'India',
            'it' => 'Italy',
            'jp' => 'Japan',
            'kr' => 'South Korea',
            'mx' => 'Mexico',
            'nl' => 'Netherlands',
            'nz' => 'New Zealand',
            'ru' => 'Russia',
            'se' => 'Sweden',
            'us' => 'United States',
            'za' => 'South Africa'
        ];
    }
}

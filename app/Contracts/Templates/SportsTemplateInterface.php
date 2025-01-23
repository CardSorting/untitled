<?php

namespace App\Contracts\Templates;

interface SportsTemplateInterface extends StickerTemplateInterface
{
    public function getSportsCategories(): array;
    public function getAthleteTypes(): array;
}

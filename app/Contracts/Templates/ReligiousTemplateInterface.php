<?php

namespace App\Contracts\Templates;

interface ReligiousTemplateInterface extends StickerTemplateInterface
{
    public function getReligiousFigures(): array;
    public function getReligiousSymbols(): array;
    public function getReligiousCategories(): array;
}

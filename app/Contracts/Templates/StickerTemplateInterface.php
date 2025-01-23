<?php

namespace App\Contracts\Templates;

interface StickerTemplateInterface
{
    public function getSubjects(): array;
    public function getCategories(): array;
    public function getExpressions(): array;
}

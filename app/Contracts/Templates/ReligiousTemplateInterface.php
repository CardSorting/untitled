<?php

namespace App\Contracts\Templates;

interface ReligiousTemplateInterface extends StickerTemplateInterface
{
    /**
     * Get religious figure suggestions for the template.
     *
     * @return array<string>
     */
    public function getReligiousFigures(): array;

    /**
     * Get religious symbols associated with this template.
     *
     * @return array<string>
     */
    public function getReligiousSymbols(): array;

    /**
     * Check if a religious figure is valid for this template.
     *
     * @param string $figure
     * @return bool
     */
    public function isValidReligiousFigure(string $figure): bool;
}

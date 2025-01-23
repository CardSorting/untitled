<?php

namespace App\Contracts\Templates;

interface StickerTemplateInterface
{
    /**
     * Get all available templates.
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Validate if a subject is valid for this template.
     *
     * @param string $subject
     * @return bool
     */
    public function validateSubject(string $subject): bool;

    /**
     * Get suggested subjects for this template.
     *
     * @return array<string>
     */
    public function getSuggestedSubjects(): array;
}

<?php

namespace App\Contracts;

use App\Models\Sticker;
use App\Models\User;

interface StickerGenerationServiceInterface
{
    public function generateSticker(array $data, User $user): Sticker;
}
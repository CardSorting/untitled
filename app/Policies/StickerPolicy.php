<?php

namespace App\Policies;

use App\Models\Sticker;
use App\Models\User;

class StickerPolicy
{
    /**
     * Determine if the given sticker can be viewed by the user.
     */
    public function view(User $user, Sticker $sticker): bool
    {
        // Only allow viewing if the user owns the sticker
        return $user->id === $sticker->user_id;
    }
}
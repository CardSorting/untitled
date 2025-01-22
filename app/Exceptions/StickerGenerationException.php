<?php

namespace App\Exceptions;

use Exception;

class StickerGenerationException extends Exception
{
    protected $message = 'Sticker generation failed';

    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        if (!$message) {
            $message = $this->message;
        }

        parent::__construct($message, $code, $previous);
    }

    public function report()
    {
        // Custom reporting logic if needed
    }

    public function render($request)
    {
        return response()->json([
            'error' => $this->getMessage()
        ], 500);
    }
}
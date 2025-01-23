<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'backblaze' => [
        'key_id' => env('BACKBLAZE_KEY_ID', '005b2784557c8a4000000002a'),
        'application_key' => env('BACKBLAZE_APPLICATION_KEY', 'K005RTGNRc31CWZzQGXXzqGrRjRsw1A'),
        'bucket_id' => env('BACKBLAZE_BUCKET_ID', '2b326768144595079c480a14'),
        'endpoint' => env('BACKBLAZE_ENDPOINT', 's3.us-east-005.backblazeb2.com'),
    ],

    'goapi' => [
        'api_key' => env('GOAPI_KEY'),
        'base_url' => 'https://api.goapi.ai/api/v1',
        'timeout' => 60,
    ],

];

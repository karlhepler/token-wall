<?php

return [

    /**
     * This is the token that will be checked against.
     */
    'token' => 'YOUR_TOKEN_HERE',

    /**
     * Determine if the token wall is enabled.
     */
    'enabled' => true,

    /**
     * Determine if/when the token wall will expire
     */
    // 'expires' => false,
    'expires' => [
        'datetime' => 'YYYY-MM-DD HH:MM:SS',
        'timezone' => 'UTC',
    ],

];

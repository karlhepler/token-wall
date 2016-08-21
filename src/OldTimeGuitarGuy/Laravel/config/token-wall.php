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

    /**
     * The plain-text message
     * that is displayed while the token wall is up
     */
    'message' => 'Access Denied',

    /**
     * The status code returned with the response
     * when the token wall is up.
     * If you're behind a load balancer like ELB,
     * you may need to keep this 200
     */
    'status' => 200,

];

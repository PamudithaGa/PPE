<?php

return [
    'paths' => ['api/*', 'checkout', 'sanctum/csrf-cookie'], // Allow API & checkout routes
    'allowed_methods' => ['*'], // Allow all HTTP methods
    'allowed_origins' => ['*'], // Allow requests from all origins (change to specific domains if needed)
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true, // Change to true if using authentication with cookies
    'same_site' => 'none',
];

<?php

return [
    // For Dev:  https://services-staging.ghtklab.com
    // For Prod: https://services.giaohangtietkiem.vn
    'api_url' => env('GHTK_API_URL', 'https://services.giaohangtietkiem.vn'),

    // For Dev:
    // For Prod: https://i.ghtk.vn
    'tracking_url' => env('GHTK_TRACKING_URL', 'https://i.ghtk.vn/'),

    // For Dev:  https://khachhang-staging.ghtklab.com
    // For Prod: https://khachhang.giaohangtietkiem.vn
    'token' => env('GHTK_TOKEN'),
    'partner_code' => env('GHTK_PARTNER_CODE'),
];

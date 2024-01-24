<?php

if (env('APP_ENV') == 'local') {
    $key = env('CLICKPAY_SERVER_KEY_TEST');
    $profile_id = env('CLICKPAY_PROFILE_ID_TEST');
} else {
    $key = env('CLICKPAY_SERVER_KEY');
    $profile_id = env('CLICKPAY_PROFILE_ID');
}


return [
    #CLICKPAY
    'CLICKPAY_SERVER_KEY' => $key,
    'CLICKPAY_PROFILE_ID' => $profile_id,
    'VERIFY_ROUTE_NAME' =>'orders.callback'
];

<?php

// You can find the keys here : https://apps.twitter.com/

return [
    'debug'               => function_exists('env') ? env('APP_DEBUG', false) : false,

    'API_URL'             => 'api.twitter.com',
    'UPLOAD_URL'          => 'upload.twitter.com',
    'API_VERSION'         => '1.1',
    'AUTHENTICATE_URL'    => 'https://api.twitter.com/oauth/authenticate',
    'AUTHORIZE_URL'       => 'https://api.twitter.com/oauth/authorize',
    'ACCESS_TOKEN_URL'    => 'https://api.twitter.com/oauth/access_token',
    'REQUEST_TOKEN_URL'   => 'https://api.twitter.com/oauth/request_token',
    'USE_SSL'             => true,

    'CONSUMER_KEY'        => 'e5KWihWqZfECKrYsM4JjKHk8p',
    'CONSUMER_SECRET'     => 'wDwMRRg2gA9Q2rf4dG7TT18fT7EoL8jDutjH7FN4DeWDbQFp6y',
    'ACCESS_TOKEN'        => '1312754788396826627-ZXqi48RjiFWHL8nFYmQTWvPMg7Wwd3',
    'ACCESS_TOKEN_SECRET' => 'Lw2BKVTT5vApVusJYQTZuGT2bxa0rohzGpjhknv6kzqur',

];

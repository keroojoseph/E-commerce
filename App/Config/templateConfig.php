<?php
namespace App\Config;
return [
    'template' => [
        'header' => TEMPLATE_PATH . 'header.php',
        'nav' => TEMPLATE_PATH . 'nav.php',
        'wrapperStart' => TEMPLATE_PATH . 'wrapperStart.php',
        ':view'  => ':action_view',
        'wrapperEnd' => TEMPLATE_PATH . 'wrapperEnd.php',
    ],
    'header_resource' => [
        'css' => [
            'style' => CSS . 'master.css',
        ],
        'js' => [
            'main' => JS . 'main.js',
            'font-awesome' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css'
        ]
    ],
    'footer_resource' => [

    ]

];

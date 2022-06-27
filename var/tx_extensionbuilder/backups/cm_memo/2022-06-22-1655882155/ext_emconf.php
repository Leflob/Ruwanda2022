<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Memo',
    'description' => 'Beispiel Extension',
    'category' => 'plugin',
    'author' => 'Flo',
    'author_email' => 'test@gmail.com',
    'state' => 'alpha',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];

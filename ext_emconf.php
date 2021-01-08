<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Hosts Variants',
    'description' => 'Extends the base variants condition with current host.',
    'category' => 'fe',
    'author' => 'Daniel Goerz',
    'author_email' => 'daniel.goerz@b13.com',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author_company' => '',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-11.1.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ]
];

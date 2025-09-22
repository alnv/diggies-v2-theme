<?php

use Contao\ArrayUtil;

ArrayUtil::arrayInsert($GLOBALS['BE_MOD']['diggies-bundle'], 1, [
    'api_import' => [
        'name' => 'api_import',
        'tables' => [
            'tl_diggies_api_import'
        ]
    ]
]);

ArrayUtil::arrayInsert($GLOBALS['BE_MOD']['content'], 2, [
    'labels' => [
        'name' => 'labels',
        'tables' => [
            'tl_labels'
        ]
    ]
]);
<?php

use App\Import\Diggies;
use Contao\Controller;
use Contao\DataContainer;
use Contao\DC_Table;
use Contao\Environment;
use Contao\Input;

$GLOBALS['TL_DCA']['tl_diggies_api_import'] = [
    'config' => [
        'dataContainer' => DC_Table::class,
        'enableVersioning' => true,
        'onload_callback' => [
            function (DataContainer $dc) {

                if (!Input::get('import')) {
                    return null;
                }

                (new Diggies($dc->id))->getObjectsById();

                Controller::redirect(base64_decode(Input::get('redirect') . '=='));
            }
        ],
        'sql' => [
            'keys' => [
                'id' => 'primary'
            ]
        ]
    ],
    'list' => [
        'sorting' => [
            'mode' => 0,
            'fields' => ['name'],
            'panelLayout' => 'filter;search,limit'
        ],
        'label' => [
            'fields' => ['name'],
            'showColumns' => true
        ],
        'operations' => [
            'edit' => [
                'icon' => 'header.svg',
                'href' => 'act=edit'
            ],
            'import' => [
                'label' => ['Import', ''],
                'icon' => 'pickfile.svg',
                'attributes' => 'onclick="if(!confirm(\'Wollen Sie den Import starten?\'))return false;Backend.getScrollOffset()"',
                'href' => 'import=1&redirect=' . \str_replace('==', '', \base64_encode(Environment::get('request')))
            ],
            'delete' => [
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . ($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? '') . '\'))return false;Backend.getScrollOffset()"'
            ]
        ]
    ],
    'palettes' => [
        'default' => 'name;baseUrl,url,params;destTable;fieldsMap'
    ],
    'fields' => [
        'id' => [
            'sql' => ['type' => 'integer', 'autoincrement' => true, 'notnull' => true, 'unsigned' => true]
        ],
        'tstamp' => [
            'sql' => ['type' => 'integer', 'notnull' => false, 'unsigned' => true, 'default' => 0]
        ],
        'name' => [
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 64,
                'tl_class' => 'w50',
                'mandatory' => true
            ],
            'search' => true,
            'sql' => ['type' => 'string', 'length' => 64, 'default' => '']
        ],
        'baseUrl' => [
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 128,
                'tl_class' => 'w50',
                'mandatory' => true
            ],
            'search' => true,
            'sql' => ['type' => 'string', 'length' => 128, 'default' => '']
        ],
        'url' => [
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 128,
                'tl_class' => 'w50',
                'mandatory' => true
            ],
            'search' => true,
            'sql' => ['type' => 'string', 'length' => 128, 'default' => '']
        ],
        'destTable' => [
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 128,
                'tl_class' => 'w50',
                'mandatory' => true
            ],
            'filter' => true,
            'sql' => ['type' => 'string', 'length' => 128, 'default' => '']
        ],
        'params' => [
            'inputType' => 'keyValueWizard',
            'eval' => [
                'tl_class' => 'clr'
            ],
            'sql' => "blob NULL"
        ],
        'fieldsMap' => [
            'inputType' => 'keyValueWizard',
            'eval' => [
                'tl_class' => 'clr'
            ],
            'sql' => "blob NULL"
        ]
    ]
];
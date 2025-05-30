<?php

return [
    'label' => ['Banner: Überschrift, Text, Link', ''],
    'types' => ['content'],
    'contentCategory' => 'DIGGIES',
    'fields' => [
        'image' => [
            'label' => ['Bild', ''],
            'inputType' => 'fileTree',
            'eval' => [
                'mandatory' => false,
                'fieldType' => 'radio',
                'files' => true,
                'filesOnly' => true,
                'tl_class' => 'clr',
                'extensions' => ($GLOBALS['TL_CONFIG']['validImageTypes'] ?? '')
            ]
        ],
        'headline' => [
            'label' => ['Überschrift', ''],
            'inputType' => 'inputUnit',
            'options' => ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
            'eval' => [
                'maxlength' => 255,
                'tl_class' => 'w50',
                'allowHtml' => true
            ]
        ],
        'text' => [
            'label' => ['Text', ''],
            'inputType' => 'textarea',
            'eval' => [
                'tl_class' => 'clr',
                'rte' => 'tinyMCE'
            ]
        ],
        'link_text' => [
            'label' => ['Text', ''],
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 255,
                'tl_class' => 'w50',
                'allowHtml' => true
            ]
        ],
        'url' => [
            'label' => ['Link URL', ''],
            'inputType' => 'text',
            'eval' => [
                'rgxp' => 'url',
                'maxlength' => 255,
                'dcaPicker' => true,
                'mandatory' => false,
                'decodeEntities' => true,
                'tl_class' => 'w50 wizard'
            ]
        ],
        'linkClass' => [
            'label' => ['Link Color', ''],
            'inputType' => 'select',
            'eval' => [
                'tl_class' => 'w50',
                'includeBlankOption' => true
            ],
            'options' => ['primary_link', 'secondary_link', 'transparent_link']
        ],
        'arrow' => [
            'label' => ['Add Arrow', ''],
            'inputType' => 'checkbox',
            'eval' => [
                'tl_class' => 'w50 m12'
            ]
        ],
        'background' => [
            'label' => ['Background Color', ''],
            'inputType' => 'select',
            'eval' => [
                'tl_class' => 'w50',
                'includeBlankOption' => true
            ],
            'options' => ['rose', 'yellow', 'violett']
        ],
        'templateId' => [
            'label' => ['ID', ''],
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50'
            ]
        ]
    ]
];
<?php

return [
    'label' => ['Diggiethek', ''],
    'types' => ['content'],
    'contentCategory' => 'Diggies',
    'fields' => [
        /*
        'icon' => [
            'label' => ['Icon', ''],
            'inputType' => 'fileTree',
            'eval' => [
                'mandatory' => false,
                'fieldType' => 'radio',
                'files' => true,
                'filesOnly' => true,
                'tl_class' => 'clr',
                'extensions' => $GLOBALS['TL_CONFIG']['validImageTypes']
            ]
        ],
        */
        'headline' => [
            'label' => ['Überschrift', ''],
            'inputType' => 'inputUnit',
            'options' => ['h1', 'h2', 'h3'],
            'eval' => [
                'tl_class' => 'w50',
                'allowHtml' => true
            ]
        ],
        /*
        'subheadline' => [
            'label' => ['Unterüberschrift', ''],
            'inputType' => 'inputUnit',
            'options' => ['h2', 'h3', 'h4'],
            'eval' => [
                'tl_class' => 'w50',
                'allowHtml' => true
            ]
        ],
        */
        'text' => [
            'label' => ['Text', ''],
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'clr',
                'rte' => 'tinyMCE'
            ]
        ],
        'groupConfig' => [
            'label' => ['Formular', ''],
            'inputType' => 'group',
        ],
        'formHeadline' => [
            'label' => ['Überschrift', ''],
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50'
            ]
        ],
        'formHeadline2' => [
            'label' => ['Überschrift (checkout)', ''],
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50'
            ]
        ],
        'formText' => [
            'label' => ['Text', ''],
            'inputType' => 'textarea',
            'eval' => [
                'tl_class' => 'clr long'
            ]
        ],
        'formText2' => [
            'label' => ['Text (checkout)', ''],
            'inputType' => 'textarea',
            'eval' => [
                'tl_class' => 'clr long'
            ]
        ],
        'formButton' => [
            'label' => ['Button', ''],
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50'
            ]
        ],
        'formEmail' => [
            'label' => ['E-Mail-Empfänger', ''],
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50',
                'rgxp' => 'emails'
            ]
        ],
        'formImage' => [
            'label' => ['Bild', ''],
            'inputType' => 'fileTree',
            'eval' => [
                'mandatory' => false,
                'fieldType' => 'radio',
                'files' => true,
                'filesOnly' => true,
                'tl_class' => 'clr',
                'extensions' => $GLOBALS['TL_CONFIG']['validImageTypes']
            ]
        ]
    ]
];
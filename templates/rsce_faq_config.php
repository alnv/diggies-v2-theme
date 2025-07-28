<?php

return [
    'label' => ['FAQ', ''],
    'types' => ['content'],
    'contentCategory' => 'DIGGIES',
    'fields' => [
        'white_section' => [
            'label' => ['White Section', ''],
            'inputType' => 'checkbox',
            'eval' => [
                'tl_class' => 'w50 m12'
            ]
        ],
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
        'not_center' => [
            'label' => ['Not Center Content', ''],
            'inputType' => 'checkbox',
            'eval' => [
                'tl_class' => 'w50 m12'
            ]
        ],
        'blocks' => [
            'label' => ['FAQ', ''],
            'inputType' => 'list',
            'minItems' => 1,
            'elementLabel' => '%s. Service',
            'fields' => [
                'white_section' => [
                    'label' => ['White Section', ''],
                    'inputType' => 'checkbox',
                    'eval' => [
                        'tl_class' => 'w50 m12'
                    ]
                ],
                'headline' => [
                    'label' => ['Überschrift', ''],
                    'inputType' => 'inputUnit',
                    'options' => ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                    'eval' => [
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'collapsible' => [
                    'label' => ['Collapsible Content', ''],
                    'inputType' => 'checkbox',
                    'eval' => [
                        'tl_class' => 'w50 m12'
                    ]
                ],
                'text' => [
                    'label' => ['Text', ''],
                    'inputType' => 'textarea',
                    'eval' => [
                        'tl_class' => 'clr',
                        'rte' => 'tinyMCE'
                    ]
                ]
            ]
        ],
        'links' => [
            'label' => ['Links', ''],
            'inputType' => 'list',
            'minItems' => 1,
            'elementLabel' => '%s. Link',
            'fields' => [
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
                'class' => [
                    'label' => ['Link Color', ''],
                    'inputType' => 'select',
                    'eval' => [
                        'tl_class' => 'w50',
                        'includeBlankOption' => true
                    ],
                    'options' => ['primary_link', 'secondary_link']
                ],
                'arrow' => [
                    'label' => ['Add Arrow', ''],
                    'inputType' => 'checkbox',
                    'eval' => [
                        'tl_class' => 'w50 m12'
                    ]
                ],
            ]
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
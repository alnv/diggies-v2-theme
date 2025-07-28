<?php

return [
    'label' => ['Slider V5: Überschrift, Text, Bild, Columns', ''],
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
        'top_center' => [
            'label' => ['Top Center', ''],
            'inputType' => 'checkbox',
            'eval' => [
                'tl_class' => 'w50 m12',
            ]
        ],
        'columns' => [
            'label' => ['Amount of Columns', ''],
            'inputType' => 'select',
            'options' => ['1', '2', '3', '4'],
            'eval' => [
                'tl_class' => 'w50',
                'includeBlankOption' => true
            ]
        ],
        'cards' => [
            'label' => ['Cards', ''],
            'inputType' => 'list',
            'minItems' => 1,
            'elementLabel' => '%s. Card',
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
                    'label' => ['Headline', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'description' => [
                    'label' => ['Card Description', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'links' => [
                    'label' => ['Links', ''],
                    'inputType' => 'list',
                    'minItems' => 1,
                    'maxItems' => 2,
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
                            'label' => ['URL', ''],
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
                        'link_class' => [
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
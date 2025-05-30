<?php

return [
    'label' => ['Cards V3: Überschrift, Text, Links', ''],
    'types' => ['content'],
    'contentCategory' => 'DIGGIES',
    'fields' => [
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
        'columns' => [
            'label' => ['Amount of Columns', ''],
            'inputType' => 'select',
            'eval' => [
                'tl_class' => 'w50',
                'includeBlankOption' => true
            ],
            'options' => ['grid_1', 'grid_2', 'grid_3', 'grid_4', 'grid_5']
        ],
        'img_left' => [
            'label' => ['Image Left', ''],
            'inputType' => 'checkbox',
            'eval' => [
                'tl_class' => 'w50 m12'
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
                'text_box_empty' => [
                    'label' => ['Empty Text Box', ''],
                    'inputType' => 'checkbox',
                    'eval' => [
                        'tl_class' => 'w50 m12'
                    ]
                ],
                'counter' => [
                    'label' => ['Add Counter', ''],
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
                'center_content' => [
                    'label' => ['Center Content', ''],
                    'inputType' => 'checkbox',
                    'eval' => [
                        'tl_class' => 'w50 m12'
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
                'class' => [
                    'label' => ['Link Color', ''],
                    'inputType' => 'select',
                    'eval' => [
                        'tl_class' => 'w50',
                        'includeBlankOption' => true
                    ],
                    'options' => ['primary_link', 'secondary_link']
                ],
                'link_image' => [
                    'label' => ['Link Bild', ''],
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
        'section_bg' => [
            'label' => ['White Background for Section', ''],
            'inputType' => 'checkbox',
            'eval' => [
                'tl_class' => 'w50 m12'
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
<?php

return [
    'label' => ['Slider V2: Überschrift, Text, Bild', ''],
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
        'grid_box' => [
            'label' => ['Create in Column', ''],
            'inputType' => 'checkbox',
            'eval' => [
                'tl_class' => 'w50 m12',
            ]
        ],
        'columns' => [
            'label' => ['Amount of Columns', ''],
            'inputType' => 'select',
            'options' => ['grid_1', 'grid_2', 'grid_3'],
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
                'category' => [
                    'label' => ['Card Category', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'category_bg' => [
                    'label' => ['Violet background for Category', ''],
                    'inputType' => 'checkbox',
                    'eval' => [
                        'tl_class' => 'w50 m12'
                    ]
                ],
                'card_type' => [
                    'label' => ['Card Type', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'date' => [
                    'label' => ['Date', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
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
                'tags' => [
                    'label' => ['Lesson Tags', ''],
                    'inputType' => 'list',
                    'maxItems' => 3,
                    'elementLabel' => '%s. Tag',
                    'fields' => [
                        'text' => [
                            'label' => ['Tag Text', ''],
                            'inputType' => 'text',
                            'eval' => [
                                'maxlength' => 255,
                                'tl_class' => 'w50',
                                'allowHtml' => true
                            ]
                        ],
                    ]
                ],
                'lesson_icons' => [
                    'label' => ['Add Lesson Icons', ''],
                    'inputType' => 'checkbox',
                    'eval' => [
                        'tl_class' => 'w50 m12'
                    ]
                ],
                'links' => [
                    'label' => ['Links', ''],
                    'inputType' => 'list',
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
        'linkText' => [
            'label' => ['Link Text', ''],
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 255,
                'tl_class' => 'w50',
                'allowHtml' => true
            ]
        ],
        'linkUrl' => [
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
            'options' => ['primary_link', 'secondary_link']
        ],
        'arrow' => [
            'label' => ['Add Arrow', ''],
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
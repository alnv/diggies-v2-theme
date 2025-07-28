<?php

return [
    'label' => ['Price: Headline, Text, Cards', ''],
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
        'section_headline' => [
            'label' => ['Section Überschrift', ''],
            'inputType' => 'inputUnit',
            'options' => ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
            'eval' => [
                'maxlength' => 255,
                'tl_class' => 'w50',
                'allowHtml' => true
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
        'columns' => [
            'label' => ['Amount of Columns', ''],
            'inputType' => 'select',
            'eval' => [
                'tl_class' => 'w50',
                'includeBlankOption' => true
            ],
            'options' => ['grid_1', 'grid_2', 'grid_3', 'grid_4', 'grid_5']
        ],
        'cards' => [
            'label' => ['Cards', ''],
            'inputType' => 'list',
            'minItems' => 1,
            'elementLabel' => '%s. Card',
            'fields' => [
                'in_row' => [
                    'label' => ['Card In Row', ''],
                    'inputType' => 'checkbox',
                    'eval' => [
                        'tl_class' => 'w50 m12'
                    ]
                ],
                'superscription' => [
                    'label' => ['Superscription', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
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
                'blue_headline' => [
                    'label' => ['Überschrift Blue', ''],
                    'inputType' => 'inputUnit',
                    'options' => ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'large_headline' => [
                    'label' => ['Large Headline', ''],
                    'inputType' => 'inputUnit',
                    'options' => ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'price' => [
                    'label' => ['Price', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'price_description' => [
                    'label' => ['Price Description', ''],
                    'inputType' => 'textarea',
                    'eval' => [
                        'tl_class' => 'clr',
                        'rte' => 'tinyMCE'
                    ]
                ],
                'benefits' => [
                    'label' => ['Benefits', ''],
                    'inputType' => 'list',
                    'minItems' => 1,
                    'elementLabel' => '%s. Benefit',
                    'fields' => [
                        'benefit_text' => [
                            'label' => ['Benefit Description', ''],
                            'inputType' => 'text',
                            'eval' => [
                                'maxlength' => 255,
                                'tl_class' => 'w50',
                                'allowHtml' => true
                            ]
                        ],
                    ]
                ],
                'card_description' => [
                    'label' => ['Card Description', ''],
                    'inputType' => 'textarea',
                    'eval' => [
                        'tl_class' => 'clr',
                        'rte' => 'tinyMCE'
                    ]
                ],
                'links' => [
                    'label' => ['Links', ''],
                    'inputType' => 'list',
                    'minItems' => 1,
                    'elementLabel' => '%s. Link',
                    'fields' => [
                        'link_text' => [
                            'label' => ['Link Text', ''],
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
                    ],
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
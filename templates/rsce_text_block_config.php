<?php

return [
    'label' => ['Text Block: Überschrift, Text, Form, Topics', ''],
    'types' => ['content'],
    'contentCategory' => 'DIGGIES',
    'fields' => [
        'form_headline' => [
            'label' => ['Form Überschrift', ''],
            'inputType' => 'inputUnit',
            'options' => ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
            'eval' => [
                'maxlength' => 255,
                'tl_class' => 'w50',
                'allowHtml' => true
            ]
        ],
        'form_fields' => [
            'label' => ['Form Fields', ''],
            'inputType' => 'list',
            'minItems' => 1,
            'maxItems' => 2,
            'elementLabel' => '%s. Field',
            'fields' => [
                'title' => [
                    'label' => ['Fiel Title', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'type' => [
                    'label' => ['Input Type', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'placeholder' => [
                    'label' => ['Placeholder', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'field_description' => [
                    'label' => ['Field Description', ''],
                    'inputType' => 'textarea',
                    'eval' => [
                        'tl_class' => 'clr',
                        'rte' => 'tinyMCE'
                    ]
                ],
            ]
        ],
        'form_links' => [
            'label' => ['Form Links', ''],
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
            'label' => ['Description', ''],
            'inputType' => 'textarea',
            'eval' => [
                'tl_class' => 'clr',
                'rte' => 'tinyMCE'
            ]
        ],
        'blocks' => [
            'label' => ['Blocks', ''],
            'inputType' => 'list',
            'minItems' => 1,
            'elementLabel' => '%s. Block',
            'fields' => [
                'block_title' => [
                    'label' => ['Block Title', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'text' => [
                    'label' => ['Block Description', ''],
                    'inputType' => 'textarea',
                    'eval' => [
                        'tl_class' => 'clr',
                        'rte' => 'tinyMCE'
                    ]
                ],
            ]
        ],
        'topics_title' => [
            'label' => ['Topics Title', ''],
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 255,
                'tl_class' => 'w50',
                'allowHtml' => true
            ]
        ],
        'topics' => [
            'label' => ['Topics', ''],
            'inputType' => 'list',
            'minItems' => 1,
            'elementLabel' => '%s. Topic',
            'fields' => [
                'text' => [
                    'label' => ['Topic Text', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
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
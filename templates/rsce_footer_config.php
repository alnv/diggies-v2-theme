<?php

return [
    'label' => ['Footer', ''],
    'types' => ['module'],
    'contentCategory' => 'DIGGIES',
    'fields' => [
        'white_section' => [
            'label' => ['White Section', ''],
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
                'card_image' => [
                    'label' => ['Card Bild', ''],
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
                'card_text' => [
                    'label' => ['Card Text', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'maxlength' => 255,
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
            ]
        ],
        'title' => [
            'label' => ['Title', ''],
            'inputType' => 'text',
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
        'priv_url' => [
            'label' => ['Privacy Policy URL', ''],
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
        'links_blocks' => [
            'label' => ['Footer blocks with links', ''],
            'inputType' => 'list',
            'minItems' => 1,
            'elementLabel' => '%s. Service',
            'fields' => [
                'headline' => [
                    'label' => ['Überschrift', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'links' => [
                    'label' => ['Footer links', ''],
                    'inputType' => 'list',
                    'minItems' => 1,
                    'elementLabel' => '%s. Service',
                    'fields' => [
                        'text' => [
                            'label' => ['Link text', ''],
                            'inputType' => 'text',
                            'eval' => [
                                'tl_class' => 'w50',
                                'allowHtml' => true
                            ]
                        ],
                        'text_url' => [
                            'label' => ['Link', ''],
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
                    ]
                ]
            ]
        ],
        'contact_blocks' => [
            'label' => ['Footer links', ''],
            'inputType' => 'list',
            'minItems' => 1,
            'elementLabel' => '%s. Service',
            'fields' => [
                'contact_headline' => [
                    'label' => ['Überschrift', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'contacts' => [
                    'label' => ['Contacts', ''],
                    'inputType' => 'list',
                    'minItems' => 1,
                    'elementLabel' => '%s. Contact',
                    'fields' => [
                        'office_name' => [
                            'label' => ['Büroname', ''],
                            'inputType' => 'text',
                            'eval' => [
                                'maxlength' => 255,
                                'tl_class' => 'w50',
                                'allowHtml' => true
                            ]
                        ],
                        'managing_director' => [
                            'label' => ['Geschäftsführer', ''],
                            'inputType' => 'text',
                            'eval' => [
                                'maxlength' => 255,
                                'tl_class' => 'w50',
                                'allowHtml' => true
                            ]
                        ],
                        'office_street' => [
                            'label' => ['Bürostraße', ''],
                            'inputType' => 'text',
                            'eval' => [
                                'maxlength' => 255,
                                'tl_class' => 'w50',
                                'allowHtml' => true
                            ]
                        ],
                        'office_zip_city' => [
                            'label' => ['Büro, Postleitzahl, Stadt', ''],
                            'inputType' => 'text',
                            'eval' => [
                                'maxlength' => 255,
                                'tl_class' => 'w50',
                                'allowHtml' => true
                            ]
                        ],
                        'time' => [
                            'label' => ['Time', ''],
                            'inputType' => 'text',
                            'eval' => [
                                'maxlength' => 255,
                                'tl_class' => 'w50',
                                'allowHtml' => true
                            ]
                        ],
                        'tel_num' => [
                            'label' => ['Telefonnummer', ''],
                            'inputType' => 'text',
                            'eval' => [
                                'maxlength' => 255,
                                'tl_class' => 'w50',
                                'allowHtml' => true
                            ]
                        ],
                        'email' => [
                            'label' => ['Email', ''],
                            'inputType' => 'text',
                            'eval' => [
                                'maxlength' => 255,
                                'tl_class' => 'w50',
                                'allowHtml' => true
                            ]
                        ],
                    ]
                ]
            ]
        ],
        'social_headline' => [
            'label' => ['Social Headline', ''],
            'inputType' => 'text',
            'eval' => [
                'tl_class' => 'w50',
                'allowHtml' => true
            ]
        ],
        'socials' => [
            'label' => ['Footer social links', ''],
            'inputType' => 'list',
            'minItems' => 1,
            'elementLabel' => '%s. Link',
            'fields' => [
                'text' => [
                    'label' => ['Link text', ''],
                    'inputType' => 'text',
                    'eval' => [
                        'tl_class' => 'w50',
                        'allowHtml' => true
                    ]
                ],
                'text_url' => [
                    'label' => ['Link', ''],
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
            ]
        ],
    ]
];
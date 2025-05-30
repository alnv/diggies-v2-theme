<?php

use Contao\FormModel;

return [
    'label' => ['Banner Form: Überschrift, Text, Form', ''],
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
        'form' => [
            'label' => ['Formular', ''],
            'inputType' => 'select',
            'eval' => [
                'tl_class' => 'w50',
                'includeBlancOption' => true
            ],
            'options_callback' => function () {
                $arrForms = [];
                if ($objForms = FormModel::findAll()) {
                    while ($objForms->next()) {
                        $arrForms[$objForms->id] = $objForms->title;
                    }
                }
                return $arrForms;
            }
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
<?php

return [
    'label' => ['Subscriptions v2', ''],
    'types' => ['content'],
    'contentCategory' => 'Diggies',
    'fields' => [
        'items' => [
            'label' => ['Subscription', ''],
            'inputType' => 'list',
            'minItems' => 1,
            'elementLabel' => '%s. Subscription',
            'fields' => [
                'subscription' => [
                    'label' => ['Subscription auswählen'],
                    'inputType' => 'select',
                    'eval' => [
                        'chosen' => true,
                        'mandatory' => true,
                        'tl_class' => 'w50',
                        'includeBlankOption' => true
                    ],
                    'options_callback' => function () {
                        $arrReturn = [];
                        $objSubscriptions = \Database::getInstance()->prepare('SELECT * FROM cm_subscription')->execute();
                        while ($objSubscriptions->next()) {
                            $arrReturn[$objSubscriptions->id] = $objSubscriptions->title;
                        }
                        return $arrReturn;
                    }
                ],
                'urlText' => [
                    'label' => ['Button-Text'],
                    'inputType' => 'text',
                    'eval' => [
                        'tl_class' => 'w50'
                    ]
                ],
                'highlight' => [
                    'label' => ['Highlight', ''],
                    'inputType' => 'checkbox',
                    'eval' => [
                        'tl_class' => 'clr'
                    ]
                ],
                'highlightText' => [
                    'label' => ['Highlight-Text', ''],
                    'inputType' => 'textarea',
                    'eval' => [
                        'tl_class' => 'clr'
                    ]
                ],
                'styles' => [
                    'label' => ['Styles', ''],
                    'inputType' => 'checkbox',
                    'options' => [
                        'blue' => 'Blau'
                    ],
                    'eval' => [
                        'tl_class' => 'clr',
                        'multiple' => true
                    ]
                ]
            ]
        ],
        'asSlider' => [
            'label' => ['Slider aktivieren', ''],
            'inputType' => 'checkbox',
            'eval' => [
                'tl_class' => 'clr'
            ]
        ],
        'groupConfig' => [
            'label' => ['Einstellungen', ''],
            'inputType' => 'group',
        ],
        'cssClass' => [
            'label' => ['CSS-Klasse(n)', 'Hier können Sie beliebig viele Klassen eingeben.'],
            'inputType' => 'checkbox',
            'options' => [
                'nomargin' => 'Kein Abstand',
                'shrink' => 'Breite auf 1024px begrenzen',
                'shrink80' => 'Breite auf 1280px begrenzen'
            ],
            'eval' => [
                'tl_class' => 'clr',
                'multiple' => true
            ]
        ]
    ]
];
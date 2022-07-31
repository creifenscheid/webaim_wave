<?php

return [
    'ctrl' => [
        #'hideTable' => true,
        'title' => 'LLL:EXT:webaim_wave/Resources/Private/Language/locallang_tca.xlf:tx_webaimwave_domain_model_report.label',
        'label' => 'crdate',
        'adminOnly' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'origUid' => 't3_origuid',
        'default_sortby' => 'crdate DESC',
        
        'transOrigPointerField' => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
        'languageField' => 'sys_language_uid',
        'translationSource' => 'l10n_source',
        
        'delete' => 'delete',
        'enablecolumns' => [
            'disabled' => 'hidden'
        ],
        
        'iconfile' => 'EXT:webaim_wave/Resources/Public/Icons/tx_webaimwave_domain_model_report.svg'
    ],
    'types' => [
        [
            'showitem' => 'crdate,
            --palette--;;testSettings,
            , result',
        ]
    ],
    'palettes' => [
        'testSettings' => [
            'label' => 'LLL:EXT:webaim_wave/Resources/Private/Language/locallang_tca.xlf:tx_webaimwave_domain_model_report.palettes.testSertings',
            'showitem' => 'page, report_type',
        ],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.enabled',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ]
            ]
        ],
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l18n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0,
                    ],
                ],
                'foreign_table' => 'tx_webaimwave_domain_model_report',
                'foreign_table_where' =>
                    'AND {#tx_webaimwave_domain_model_report}.{#pid}=###CURRENT_PID###'
                    . ' AND {#tx_webaimwave_domain_model_report}.{#sys_language_uid} IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'l18n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => '',
            ],
        ],
        'crdate' => [
            'label' => 'LLL:EXT:webaim_wave/Resources/Private/Language/locallang_tca.xlf:tx_webaimwave_domain_model_report.crdate',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'date,int',
                'default' => 0
            ]
        ],
        'page' => [
            'label' => 'LLL:EXT:webaim_wave/Resources/Private/Language/locallang_tca.xlf:tx_webaimwave_domain_model_report.page',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'pages',
                'readOnly' => true
            ],
        ],
        'report_type' => [
            'label' => 'LLL:EXT:webaim_wave/Resources/Private/Language/locallang_tca.xlf:tx_webaimwave_domain_model_report.report_type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle'
                'default' => 1,
                'items' => [
                    [
                        'LLL:EXT:webaim_wave/Resources/Private/Language/locallang_tca.xlf:tx_webaimwave_domain_model_report.report_type.1',
                        1
                    ],
                    [
                        'LLL:EXT:webaim_wave/Resources/Private/Language/locallang_tca.xlf:tx_webaimwave_domain_model_report.report_type.2',
                        2
                    ]
                ],
                'readOnly' => true
            ]
        ],
        'result' => [
            'label' => 'LLL:EXT:webaim_wave/Resources/Private/Language/locallang_tca.xlf:tx_webaimwave_domain_model_report.result',
            'config' => [
                'type' => 'text',
                'default' => '',
                'readOnly' => true
            ]
        ]
    ]
];
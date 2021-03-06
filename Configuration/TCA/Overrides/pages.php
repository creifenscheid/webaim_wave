<?php

call_user_func(static function () {
    $additionalColumns = [
        'tx_webaimwave_apikey' => [
            'label' => 'LLL:EXT:webaim_wave/Resources/Private/Language/locallang.xlf:pages.tx_webaimwave_apikey',
            'description' => 'LLL:EXT:webaim_wave/Resources/Private/Language/locallang.xlf:pages.tx_webaimwave_apikey.description',
            'displayCond' => 'FIELD:is_siteroot:REQ:true',
            'config' => [
                'default' => null,
                'type' => 'input',
                'eval' => 'trim,null'
            ]
        ]
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'pages',
        $additionalColumns
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        '--div--;LLL:EXT:webaim_wave/Resources/Private/Language/locallang.xlf:pages.tab.webaimwave, tx_webaimwave_apikey',
        '1'
    );

    $GLOBALS['TCA']['pages']['columns']['is_siteroot']['onChange'] = 'reload';
});

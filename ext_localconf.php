<?php

defined('TYPO3_MODE') or die();

(function ($extKey) {
    
    /**
     * EXTEND ROOTLINE FIELDS
     * Adds pages:module
     */
    $rootlinefields = &$GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'];
    if ($rootlinefields !== '') {
        $rootlinefields .= ' , ';
    }
    $rootlinefields .= 'tx_webaimwave_apikey';
    
})('webaim_wave');

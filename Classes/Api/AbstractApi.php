<?php

namespace CReifenscheid\WebaimWave\Api;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2022 C. Reifenscheid
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Class AbstractApi
 *
 * @package \CReifenscheid\WebaimWave\Api
 */
abstract class AbstractApi implements \CReifenscheid\WebaimWave\Api\ApiInterface {

  /**
   * API key
   *
   * @var null|string
   */
  private ?string $apiKey = null;

  /**
   * Uid of page to test
   *
   * @var null|int
   */
  private ?int $pageUid = null;
  
  /**
   * Constructor
   *
   * @param int $pageUid 
   */
  public function __construct(int $pageUid)
  {
     $this->pageUid = $pageUid;
     $this->apiKey = $this->getApiKey();
  }
  
  /**
   * Returns the configured API key
   *
   * @return string
   */
  public function getApiKey() : string
  {
     // if no API key is set
     if($this->apiKey === null) {
        
        // get API key from root page of set page
        $rootlineUtility = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(RootlineUtility::class, $this->pageUid);

        $rootline = $rootlineUtility->get();
        $rootPage = end($rootline);
        
        var_dump($rootPage);die();
        // get root page
        // get api key of root page
        
        // if there is no root page API key configuration
        if($this->apiKey === null) {
           // get API key from extension configuration
           $extConfApiKey = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)
   ->get('webaim_wave', 'key');
           
           if(!empty($extConfApiKey)) {
              $this->apiKey = $extConfApiKey;
           }
        }
     }
     
     // check if an api key is set now
     if($this->apiKey === null) {
        // throw exception
        // log error (loggerAwsreTrait)
     }
    
     return $this->apiKey; 
  }
}
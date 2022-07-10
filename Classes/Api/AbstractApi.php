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
   * API base url
   *
   * @var null|string 
   */
  protected ?string $baseUrl = null;

  /**
   * API key
   *
   * @var null|string
   */
  protected ?string $apiKey = null;

  /**
   * Uid of page to test
   *
   * @var null|int
   */
  protected ?int $pageUid = null; 
  
  /**
   * Constructor
   *
   * @param int $pageUid 
   */
  public function __construct(int $pageUid)
  {
     $this->pageUid = $pageUid;
     $this->apiKey = $this->getApiKey();
     $this->baseUrl = $this->getBaseUrl();
  }
  
  /**
   * Returns the configured API key
   *
   * @return string
   */
  protected function getApiKey() : string
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
           $extConfApiKey = \CReifenscheid\WebaimWave\Utility\GeneralUtility::getExtensionConfiguration('key');
           
           if(!empty($extConfApiKey)) {
              $this->apiKey = $extConfApiKey;
           }
        }
     }
     
     // check if an api key is set now
     if($this->apiKey === null) {
        // @SeppTodo
        // throw exception
        // log error (loggerAwsreTrait)
     }
    
     return $this->apiKey; 
  }
  
  /**
   * Returns the configured API key
   *
   * @return string
   */
  protected function getBaseUrl() : string
  {
     // if no base url is set
     if($this->baseUrl === null) {
         $extConfBaseUrl = \CReifenscheid\WebaimWave\Utility\GeneralUtility::getExtensionConfiguration('baseUrl');
           
           if(!empty($extConfBaseUrl)) {
              $this->baseUrl = $extConfBaseUrl;
           } else {
              // @SeppTodo
              // throw exception
              // log error (loggerAwsreTrait)
           }
     }
     
     return $this->baseUrl;
  }
  
  /**
   * Returns generated API url
   *
   * @param null|array $parameters 
   *
   * @return string
   */
  public function buildRequestUrl(?array $parameters = null) : string
  {
      $urlParams = '';
  
      if($parameters !== null) {
          // @SeppTodo
          // generate url parameter string
      }
      
      return $this->baseUrl . $urlParams;
  }
}
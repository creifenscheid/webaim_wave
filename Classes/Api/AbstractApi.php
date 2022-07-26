<?php

namespace CReifenscheid\WebaimWave\Api;

use CReifenscheid\WebaimWave\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\RootlineUtility;

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
abstract class AbstractApi implements ApiInterface
{
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
     *
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException
     */
    public function __construct(int $pageUid)
    {
        $this->pageUid = $pageUid;
        $this->apiKey = $this->getApiKey();
        $this->baseUrl = $this->getBaseUrl();

        $this->buildRequestUrl(['key' => '123', 'url' => 'https://www.christian-reifenscheid.de']);
    }

    /**
     * Returns the configured API key
     *
     * @return null|string
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException
     */
    protected function getApiKey() : ?string
    {
        // if no API key is set
        if ($this->apiKey === null) {

            // get API key from root page of set page
            $rootlineUtility = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(RootlineUtility::class, $this->pageUid);

            $rootline = $rootlineUtility->get();
            $rootPage = end($rootline);

            if (!empty($rootPage['tx_webaimwave_apikey'])) {
                $this->apiKey = $rootPage['tx_webaimwave_apikey'];
            }

            // if there is no root page API key configuration
            if ($this->apiKey === null) {
                // get API key from extension configuration
                $extConfApiKey = GeneralUtility::getExtensionConfiguration('key');

                if (!empty($extConfApiKey)) {
                    $this->apiKey = $extConfApiKey;
                }
            }
        }

        return $this->apiKey;
    }

    /**
     * Returns the configured API base url
     *
     * @return null|string
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException
     */
    protected function getBaseUrl() : ?string
    {
        // if no base url is set
        if ($this->baseUrl === null) {
            $extConfBaseUrl = GeneralUtility::getExtensionConfiguration('baseUrl');

            if (!empty($extConfBaseUrl)) {
                $this->baseUrl = $extConfBaseUrl;
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
    protected function buildRequestUrl(?array $parameters = null) : string
    {
        $urlParams = '';

        if ($parameters !== null) {
            $urlParams = GeneralUtility::implodeArrayForUrl($parameters);
        }

        return $this->baseUrl . $urlParams;
    }
}
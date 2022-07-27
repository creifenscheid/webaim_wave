<?php

namespace CReifenscheid\WebaimWave\Api;

use CReifenscheid\WebaimWave\Utility\GeneralUtility;

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
 * Class SubscriptionApi
 *
 * @package \CReifenscheid\WebaimWave\Api
 */
class SubscriptionApi extends AbstractApi
{
    /**
     * Report type
     *
     * @var int
     * @see https://wave.webaim.org/api/details
     */
    private int $reportType = 1;

    /**
     * Result format
     */
    private const FORMAT = 'json';

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
        parent::__construct($pageUid);
        $this->reportType = $this->getReportType();
    }

    /**
     * Function to call API and return purified response
     *
     * @return null|array
     */
    public function get() : ?array
    {
        return null;
    }

    /**
     * Function to get the report type
     *
     * @return int
     */
    private function getReportType() : int
    {
        return $this->rootPage['tx_webaimwave_reporttype'];
    }
}
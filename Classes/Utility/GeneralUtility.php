<?php

namespace CReifenscheid\WebaimWave\Utility;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;

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
 * Class GeneralUtility
 *
 * @package \CReifenscheid\WebaimWave\Utility
 */
class GeneralUtility
{
    /**
     * Returns the extension configuration value of the given key
     *
     * @param string $key
     *
     * @return null|string
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException
     */
    public static function getExtensionConfiguration(string $key) : ?string
    {
        if (!empty($key)) {
            return \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(ExtensionConfiguration::class)
                ->get('webaim_wave', $key);
        }

        return null;
    }

    /**
     * Returns an url prepared string based on the given array
     *
     * $array = [
     *      'name' => 'value',
     *      'name2' => 'value2'
     * ]
     *
     * => ?name=value&name2=value2
     *
     * @param array $parameters
     *
     * @return string
     */
    public static function implodeArrayForUrl(array $parameters) : string
    {
        $urlParams = '';

        foreach ($parameters as $key => $value) {
            $parameterName = $key;
            $parameterValue = rawurlencode($value);

            if ($key === array_key_first($parameters)) {
                $urlParams .= '?';
            } else {
                $urlParams .= '&';
            }

            $urlParams .= $parameterName . '=' . $parameterValue;
        }

        return $urlParams;
    }
}

<?php

namespace CReifenscheid\WebaimWave\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

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
 * Class Report
 *
 * @package \CReifenscheid\WebaimWave\Domain\Model
 */
class Report extends AbstractEntity
{
    /**
     * Creation date of the entry
     *
     * @var int
     */
    protected int $crdate = 0;

    /**
     * Uid of reported page
     *
     * @var int
     */
    protected int $page = 0;

    /**
     * Report type
     * default: 1 (statistics)
     *
     * @var int
     */
    protected int $reportType = 1;

    /**
     * Include contrast information in report
     *
     * @var bool
     */
    protected bool $contrast = false;

    /**
     * Include alerts in report
     *
     * @var bool
     */
    protected bool $alert = false;

    /**
     * Include structure information in report
     *
     * @var bool
     */
    protected bool $structure = false;

    /**
     * Include feature information in report
     *
     * @var bool
     */
    protected bool $feature = false;

    /**
     * Include aria information in report
     *
     * @var bool
     */
    protected bool $aria = false;

    /**
     * Result response as json
     *
     * @var string|null
     */
    protected ?string $result = null;

    /**
     * Returns the creation date
     *
     * @return int
     */
    public function getCrdate() : int
    {
        return $this->crdate;
    }

    /**
     * Sets the creation date
     *
     * @param int $crdate
     *
     * @return void
     */
    public function setCrdate(int $crdate) : void
    {
        $this->crdate = $crdate;
    }

    /**
     * Returns
     *
     * @return int
     */
    public function getPage() : int
    {
        return $this->page;
    }

    /**
     * Sets  the uid of the tested page
     *
     * @param int $page
     */
    public function setPage(int $page) : void
    {
        $this->page = $page;
    }

    /**
     * Returns the configured report type
     *
     * @return int
     */
    public function getReportType() : int
    {
        return $this->reportType;
    }

    /**
     * Sets the configured report type
     *
     * @param int $reportType
     *
     * @return void
     */
    public function setReportType(int $reportType) : void
    {
        $this->reportType = $reportType;
    }

    /**
     * Returns if contrast information shall be included
     *
     * @return bool
     */
    public function getContrast() : bool
    {
        return $this->contrast;
    }

    /**
     * Sets if contrast information shall be included
     *
     * @param bool $contrast
     *
     * @return void
     */
    public function setContrast(bool $contrast) : void
    {
        $this->contrast = $contrast;
    }

    /**
     * Returns if alerts shall be included
     *
     * @return bool
     */
    public function getAlert() : bool
    {
        return $this->alert;
    }

    /**
     * Sets if alerts shall be included
     *
     * @param bool $alert
     *
     * @return void
     */
    public function setAlert(bool $alert) : void
    {
        $this->alert = $alert;
    }

    /**
     * Returns if structure information shall be included
     *
     * @return bool
     */
    public function getStructure() : bool
    {
        return $this->structure;
    }

    /**
     * Sets if structure information shall be included
     *
     * @param bool $structure
     *
     * @return void
     */
    public function setStructure(bool $structure) : void
    {
        $this->structure = $structure;
    }

    /**
     * Returns if features shall be included
     *
     * @return bool
     */
    public function getFeature() : bool
    {
        return $this->feature;
    }

    /**
     * Sets if features shall be included
     *
     * @param bool $feature
     *
     * @return void
     */
    public function setFeature(bool $feature) : void
    {
        $this->feature = $feature;
    }

    /**
     * Returns if aria information shall be incluced
     *
     * @return bool
     */
    public function getAria() : bool
    {
        return $this->aria;
    }

    /**
     * Sets if aria information shall be incluced
     *
     * @param bool $aria
     *
     * @return void
     */
    public function setAria(bool $aria) : void
    {
        $this->aria = $aria;
    }

    /**
     * Returns the result
     *
     * @return string|null
     */
    public function getResult() : ?string
    {
        return $this->result;
    }

    /**
     * Sets the result
     *
     * @param string|null $result
     *
     * @return void
     */
    public function setResult(?string $result) : void
    {
        $this->result = $result;
    }
}
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
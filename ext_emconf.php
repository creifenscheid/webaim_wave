<?php

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

$EM_CONF[$_EXTKEY] = [
    'title' => 'WebAIM WAVE',
    'description' => 'Accessibility testing of pages via WebAIM WAVE subscription API',
    'category' => 'be',
    'author' => 'C. Reifenscheid',
    'version' => '11.0.0',
    'state' => 'alpha',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99'
        ]
    ],
    'autoload' => [
        'psr-4' => [
            'CReifenscheid\\WebaimWave\\' => 'Classes'
        ]
    ]
];

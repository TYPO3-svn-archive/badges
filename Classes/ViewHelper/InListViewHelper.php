<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Sven Burkert <bedienung@sbtheke.de>, SBTheke web development
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
 *
 *
 * @package badges
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Badges_ViewHelper_InListViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Checks if a value is in a comma separated list.
	 * If no list is provided, true is returned
	 *
	 * @param string $list
	 * @param string $index
	 * @return boolean
	 */
	public function render($list, $index) {
		if($list) {
			$array = t3lib_div::trimExplode(',', $list);
			return in_array($index, $array);
		} else {
			return true;
		}
	}
}
?>
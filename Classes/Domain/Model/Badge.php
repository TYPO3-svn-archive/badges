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
 * @package t3o_snippets
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Badges_Domain_Model_Badge extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * crdate
	 *
	 * @var integer
	 */
	protected $crdate;

	/**
	 * tstamp
	 *
	 * @var integer
	 */
	protected $tstamp;

	/**
	 * date_start
	 *
	 * @var integer
	 */
	protected $dateStart;

	/**
	 * date_end
	 *
	 * @var integer
	 */
	protected $dateEnd;

	/**
	 * category
	 *
	 * @var Tx_Badges_Domain_Model_Category
	 * @validate NotEmpty
	 */
	protected $category;

	/**
	 * parentid
	 *
	 * @var Tx_Badges_Domain_Model_User
	 */
	protected $parentid;

	/**
	 * Returns the tstamp
	 *
	 * @return integer $tstamp
	 */
	public function getTstamp() {
		return $this->tstamp;
	}

	/**
	 * Sets the tstamp
	 *
	 * @param integer $tstamp
	 * @return void
	 */
	public function setTstamp($tstamp) {
		$this->tstamp = $tstamp;
	}

	/**
	 * Returns the crdate
	 *
	 * @return integer $crdate
	 */
	public function getCrdate() {
		return $this->crdate;
	}

	/**
	 * Sets the crdate
	 *
	 * @param integer $crdate
	 * @return void
	 */
	public function setCrdate($crdate) {
		$this->crdate = $crdate;
	}

	/**
	 * Returns the date_start
	 *
	 * @return string $dateStart
	 */
	public function getDateStart() {
		return $this->dateStart;
	}

	/**
	 * Sets the date_start
	 *
	 * @param string $dateStart
	 * @return void
	 */
	public function setDateStart($dateStart) {
		$this->dateStart = $dateStart;
	}

	/**
	 * Returns the date_end
	 *
	 * @return string $dateEnd
	 */
	public function getDateEnd() {
		return $this->dateEnd;
	}

	/**
	 * Sets the date_end
	 *
	 * @param string $dateEnd
	 * @return void
	 */
	public function setDateEnd($dateEnd) {
		$this->dateEnd = $dateEnd;
	}

	/**
	 * Returns the category
	 *
	 * @return Tx_Badges_Domain_Model_Category $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 *
	 * @param Tx_Badges_Domain_Model_Category $category
	 * @return void
	 */
	public function setCategory(Tx_Badges_Domain_Model_Category $category) {
		$this->category = $category;
	}

	/**
	 * Returns the parentid
	 *
	 * @return Tx_Badges_Domain_Model_User $parentid
	 */
	public function getParentid() {
		return $this->parentid;
	}

	/**
	 * Sets the parentid
	 *
	 * @param Tx_Badges_Domain_Model_User $parentid
	 * @return void
	 */
	public function setParentid(Tx_Badges_Domain_Model_User $parentid) {
		$this->parentid = $parentid;
	}

}
?>
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
class Tx_Badges_Domain_Model_User extends Tx_Extbase_Domain_Model_FrontendUser {

	/**
	 * Settings
	 *
	 * @var array
	 */
	#protected $settings = array();

	/**
	 * Configuration manager
	 *
	 * @var Tx_Extbase_Configuration_ConfigurationManager
	 */
	#protected $configurationManager;

	/**
	 * Inject configuration manager
	 *
	 * @param Tx_Extbase_Configuration_ConfigurationManager $configurationManager
	 * @return void
	 */
	#public function injectConfigurationManager(Tx_Extbase_Configuration_ConfigurationManager $configurationManager) {
	#	$this->configurationManager = $configurationManager;
	#	$this->settings = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
	#}

	/**
	 * tx_badges_badge
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Badges_Domain_Model_Badge>
	 */
	protected $txBadgesBadge;

	/**
	 * Returns the tx_badges_badge
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Badges_Domain_Model_Badge> $txBadgesBadge
	 */
	public function getTxBadgesBadge() {
		return $this->txBadgesBadge;
	}

	/**
	 * Returns the badges (sorted)
	 *
	 * @return Tx_Badges_Domain_Model_Badge
	 */
	public function getBadgesSorted() {
		$objectManager = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager');
		$badgeRepository = $objectManager->get('Tx_Badges_Domain_Repository_BadgeRepository');
		return $badgeRepository->findByParentid($this);
	}

}
?>
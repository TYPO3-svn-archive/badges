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
class Tx_Badges_Controller_BadgeController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * badgeRepository
	 *
	 * @var Tx_Badges_Domain_Repository_BadgeRepository
	 */
	protected $badgeRepository;

	/**
	 * injectBadgeRepository
	 *
	 * @param Tx_Badges_Domain_Repository_BadgeRepository $badgeRepository
	 * @return void
	 */
	public function injectBadgeRepository(Tx_Badges_Domain_Repository_BadgeRepository $badgeRepository) {
		$this->badgeRepository = $badgeRepository;
	}

	/**
	 * action list
	 *
	 * @param string $letter
	 * @param string $search
	 * @param string $country
	 * @param Tx_Badges_Domain_Model_Category $category
	 * @return void
	 */
	public function listAction($letter = NULL, $search = NULL, $country = NULL, Tx_Badges_Domain_Model_Category $category = NULL) {
		if($search || $country || $category) {
			$letter = 'all';
		}
		$categories = array();
		if($this->settings['category']) {
			foreach(t3lib_div::intExplode(',', $this->settings['category']) as $uid) {
				$categories[] = $this->objectManager->get('Tx_Badges_Domain_Repository_CategoryRepository')->findByUid($uid);
			}
		}
		$users = $this->objectManager->get('Tx_Badges_Domain_Repository_UserRepository')->findByBadges(
			$category ? $category : $categories,
			$letter != 'all' ? $letter : NULL,
			$search,
			$country
		);

		// TODO: if FLUID supports it, add empty option in FLUID
		$categories = array_merge(array(NULL => ''), $categories);

		$countries = $this->objectManager->get('Tx_Badges_Domain_Repository_UserRepository')->findCountries();
		// TODO: if FLUID supports it, add empty option in FLUID
		$countries = $countries->toArray();
		$countries = array_merge(array(NULL => ''), $countries);

		$this->view->assign('users', $users);
		$this->view->assign('settings', $this->settings);
		$this->view->assign('letter', $letter);
		$this->view->assign('search', $search);
		$this->view->assign('categories', $categories);
		$this->view->assign('category', $category);
		$this->view->assign('categoriesUids', $category ? $category->getUid() : $this->settings['category']);
		$this->view->assign('countries', $countries);
		$this->view->assign('country', $country);
	}

	/**
	 * action listUncached
	 *
	 * @param string $search
	 * @param string $country
	 * @param Tx_Badges_Domain_Model_Category $category
	 * @return void
	 */
	public function listUncachedAction($search = NULL, $country = NULL, Tx_Badges_Domain_Model_Category $category = NULL) {
		$this->listAction(NULL, $search, $country, $category);
	}

}
?>
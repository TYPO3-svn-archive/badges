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
class Tx_Badges_Domain_Repository_UserRepository extends Tx_Extbase_Domain_Repository_FrontendUserRepository {

	/**
	 * Get users with badges
	 *
	 * @param array $category
	 * @param string $letter
	 * @param string $search
	 * @param string $country
	 * @return object|integer: query object or count of found records
	 */
	public function findByBadges($category = NULL, $letter = NULL, $search = NULL, $country = NULL) {
		/*$additionalWhere = '1=1';
		if($category) {
			$additionalWhere .= sprintf(
				' AND b.category IN(%s)',
				$category
			);
		}
		$statement = sprintf('
			SELECT u.*
			FROM fe_users u
			LEFT JOIN tx_badges_domain_model_badge b
				ON (
					b.parentid = u.uid
					AND b.deleted = 0
					AND b.hidden = 0
				)
			WHERE %s
				AND u.deleted = 0
				AND u.disable = 0
				AND u.tx_badges_badge > 0
			%s
			GROUP BY u.uid',
				$additionalWhere,
				$limit ? 'LIMIT ' . $limit : ''
		);*/
		$query = $this->createQuery();
		$and = array();
		$and[] = $query->greaterThan('tx_badges_badge', 0);
		if($category) {
			$and[] = $query->equals('txBadgesBadge.category', $category);
		}
		if($letter) {
			$and[] = $query->like('username', $letter . '%');
		}
		if($search) {
			$or = array();
			$or[] = $query->like('username', '%' . $search . '%');
			$or[] = $query->like('first_name', '%' . $search . '%');
			$or[] = $query->like('last_name', '%' . $search . '%');
			$or[] = $query->like('name', '%' . $search . '%');
			$and[] = $query->logicalOr($or);
		}
		if($country) {
			$and[] = $query->equals('country', $country);
		}
		$constraint = $query->logicalAnd($and);
		return $query
			->matching($constraint)
			->execute();
	}

	/**
	 * Get countries of users with badges
	 *
	 * @return object|integer: query object or count of found records
	 */
	public function findCountries() {
		$query = $this->createQuery();
		$and = array();
		$and[] = $query->greaterThan('tx_badges_badge', 0);
		$and[] = $query->greaterThan('country', 0);
		$constraint = $query->logicalAnd($and);
		return $query
			->matching($constraint)
			->execute();
	}

}
?>
<?php

/* * *************************************************************
 *  Copyright notice
 *
 *  (c)  Tim Lochmueller
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * ************************************************************* */

/**
 * Repository for Tx_Hettich_Domain_Repository_Exposition
 *
 * @author     Michael Feinbier
 * @subpackage Repository
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_WsFlexslider_Domain_Repository_ImageRepository extends Tx_Extbase_Persistence_Repository {

	/**
	 * All Queries withoud storagePID
	 *
	 * @return Tx_Extbase_Persistence_QueryInterface
	 */
	public function createQuery() {
		$query = parent::createQuery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		return $query;
	}

	/**
	 * Finds an object matching the given identifier.
	 *
	 * @param  integer $uid The identifier of the object to find
	 * @return object  The matching object if found, otherwise NULL
	 */
	public function findByUid($uid) {
		if (!is_int($uid) || $uid < 0)
			throw new InvalidArgumentException('The uid must be a positive integer', 1245071889);
		if ($this->identityMap->hasIdentifier($uid, $this->objectType)) {
			$object = $this->identityMap->getObjectByIdentifier($uid, $this->objectType);
		} else {
			$query = $this->createQuery();
			$object = $query->matching($query->equals('uid', $uid))->execute()->getFirst();
			$this->identityMap->registerObject($object, $uid);
		}
		return $object;
	}

	/**
	 *
	 * @param array $uids
	 * @return array
	 */
	public function findByUids($uids) {
		if (!is_array($uids))
			throw new InvalidArgumentException('The uids must be stored in an array', 1245072889);
		$objects = array();
		foreach ($uids as $u)
			$objects[] = $this->findByUid(intval($u));
		return $objects;
	}

}

if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/ws_flexslider/Classes/Domain/Repository/ImageRepository.php"]) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/ws_flexslider/Classes/Domain/Repository/ImageRepository.php"]);
}
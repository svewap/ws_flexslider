<?php
namespace WapplerSystems\WsFlexslider\Domain\Repository;

/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Sven Wappler <typo3YYYY@wapplersystems.de>, WapplerSystems
 *
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
 * 
 *
 * @author     Sven Wappler
 * @subpackage Repository
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class ImageRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	public function initializeObject(){
		$querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
		
		//don't add the pid constraint
		$querySettings->setRespectStoragePage(FALSE);
		
	}
	
	
	
	
	/**
	 * Query for images by content uid and sorted by sorting position
	 * 
	 * @param \int $cuid Content uid 
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResult the images for the selected content element
	 */
	public function findAllByContentUid($cuid){
		$query = $this->createQuery();
		//remove the storage pid and language constraints
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		$query->getQuerySettings()->setRespectSysLanguage(FALSE);
		//$query->setOrderings(array('sorting'=>\TYPO3\CMS\Extbase\Persistence\Generic\Query::ORDER_ASCENDING));
		return $query->matching($query->equals('content_uid',$cuid))
				->setOrderings(array('sorting'=>\TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING))
				->execute();
		
	}

}

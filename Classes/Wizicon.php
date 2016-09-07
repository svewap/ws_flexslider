<?php
namespace WapplerSystems\WsFlexslider;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Class that adds the wizard icon.
 *
 * @author	Sven Wappler <typo3@wappler.systems>
 * @package	TYPO3
 * @subpackage 
 */
class Wizicon {

	/**
	 * Processing the wizard items array
	 *
	 * @param	array		$wizardItems: The wizard items
	 * @return	Modified array with wizard items
	 */
	function proc($wizardItems) {


		$wizardItems['plugins_tx_wsflexslider_pi1'] = array(
			'icon' => ExtensionManagementUtility::extRelPath('ws_flexslider') . 'Resources/Public/Icons/icon.png',
			'title' => LocalizationUtility::translate('list_title', 'ws_flexslider'),
			'description' => LocalizationUtility::translate('list_plus_wiz_description', 'ws_flexslider'),
			'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=wsflexslider_pi1'
		);

		return $wizardItems;
	}



}

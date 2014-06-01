<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Sven Wappler <typo3YYYY@wapplersystems.de>, WapplerSystems
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
 * @package ws_flexslider
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_WsFlexslider_Controller_FlexsliderController extends Tx_Extbase_MVC_Controller_ActionController {




	public function initializeAction() {

		$this->imageRepository = $this->objectManager->get('Tx_WsFlexslider_Domain_Repository_ImageRepository');
		$this->configuration = $this->settings['flexslider'];


		$FeConfigManager = $this->objectManager->get('Tx_Extbase_Configuration_FrontendConfigurationManager');
		$ts = $FeConfigManager->getTypoScriptSetup();

		// Check Static include
		if (!@strlen($ts['plugin.']['tx_wsflexslider.']['view.']['templateRootPath'])) {
			$this->flashMessageContainer->add('You have to include the static extension Template of the Flexslider.');
		}

		// Settings

		if (isset($this->settings['ff']['maxwidth']) && strlen($this->settings['ff']['maxwidth']) > 0)
			$this->settings['maxwidth'] = $this->settings['ff']['maxwidth'];
		if (isset($this->settings['ff']['maxheight']) && strlen($this->settings['ff']['maxheight']) > 0)
			$this->settings['maxheight'] = $this->settings['ff']['maxheight'];
		if (isset($this->settings['ff']['animation']) && $this->settings['ff']['animation'] != 'ts')
			$this->settings['animation'] = $this->settings['ff']['animation'];
		if (isset($this->settings['ff']['easing']) && strlen($this->settings['ff']['easing']) > 0)
			$this->settings['easing'] = $this->settings['ff']['easing'];
		if (isset($this->settings['ff']['direction']) && $this->settings['ff']['direction'] != 'ts')
			$this->settings['direction'] = $this->settings['ff']['direction'];
		if (isset($this->settings['ff']['reverse']) && $this->settings['ff']['reverse'] != 'ts')
			$this->settings['reverse'] = $this->settings['ff']['reverse'];
		if (isset($this->settings['ff']['animationLoop']) && $this->settings['ff']['animationLoop'] != 'ts')
			$this->settings['animationLoop'] = $this->settings['ff']['animationLoop'];
		if (isset($this->settings['ff']['smoothHeight']) && $this->settings['ff']['smoothHeight'] != 'ts')
			$this->settings['smoothHeight'] = $this->settings['ff']['smoothHeight'];
		if (isset($this->settings['ff']['startAt']) && intval($this->settings['ff']['startAt']) > 0)
			$this->settings['startAt'] = $this->settings['ff']['startAt'];
		if (isset($this->settings['ff']['slideshow']) && $this->settings['ff']['slideshow'] != 'ts')
			$this->settings['slideshow'] = $this->settings['ff']['slideshow'];
		if (isset($this->settings['ff']['slideshowSpeed']) && intval($this->settings['ff']['slideshowSpeed']) > 0)
			$this->settings['slideshowSpeed'] = $this->settings['ff']['slideshowSpeed'];
		if (isset($this->settings['ff']['animationSpeed']) && intval($this->settings['ff']['animationSpeed']) > 0)
			$this->settings['animationSpeed'] = $this->settings['ff']['animationSpeed'];
		if (isset($this->settings['ff']['initDelay']) && intval($this->settings['ff']['initDelay']) > 0)
			$this->settings['initDelay'] = $this->settings['ff']['initDelay'];
		if (isset($this->settings['ff']['randomize']) && $this->settings['ff']['randomize'] != 'ts')
			$this->settings['randomize'] = $this->settings['ff']['randomize'];
		if (isset($this->settings['ff']['pauseOnAction']) && $this->settings['ff']['pauseOnAction'] != 'ts')
			$this->settings['pauseOnAction'] = $this->settings['ff']['pauseOnAction'];
		if (isset($this->settings['ff']['pauseOnHover']) && $this->settings['ff']['pauseOnHover'] != 'ts')
			$this->settings['pauseOnHover'] = $this->settings['ff']['pauseOnHover'];
		if (isset($this->settings['ff']['useCSS']) && $this->settings['ff']['useCSS'] != 'ts')
			$this->settings['useCSS'] = $this->settings['ff']['useCSS'];
		if (isset($this->settings['ff']['touch']) && $this->settings['ff']['touch'] != 'ts')
			$this->settings['touch'] = $this->settings['ff']['touch'];
		if (isset($this->settings['ff']['video']) && $this->settings['ff']['video'] != 'ts')
			$this->settings['video'] = $this->settings['ff']['video'];
		if (isset($this->settings['ff']['controlNav']) && $this->settings['ff']['controlNav'] != 'ts')
			$this->settings['controlNav'] = $this->settings['ff']['controlNav'];
		if (isset($this->settings['ff']['directionNav']) && $this->settings['ff']['directionNav'] != 'ts')
			$this->settings['directionNav'] = $this->settings['ff']['directionNav'];
		if (isset($this->settings['ff']['keyboard']) && $this->settings['ff']['keyboard'] != 'ts')
			$this->settings['keyboard'] = $this->settings['ff']['keyboard'];
		if (isset($this->settings['ff']['multipleKeyboard']) && $this->settings['ff']['multipleKeyboard'] != 'ts')
			$this->settings['multipleKeyboard'] = $this->settings['ff']['multipleKeyboard'];
		if (isset($this->settings['ff']['mousewheel']) && $this->settings['ff']['mousewheel'] != 'ts')
			$this->settings['mousewheel'] = $this->settings['ff']['mousewheel'];
		if (isset($this->settings['ff']['pausePlay']) && $this->settings['ff']['pausePlay'] != 'ts')
			$this->settings['pausePlay'] = $this->settings['ff']['pausePlay'];
		if (isset($this->settings['ff']['controlsContainer']) && strlen($this->settings['ff']['controlsContainer']) > 0)
			$this->settings['controlsContainer'] = $this->settings['ff']['controlsContainer'];
		if (isset($this->settings['ff']['manualControls']) && strlen($this->settings['ff']['manualControls']) > 0)
			$this->settings['manualControls'] = $this->settings['ff']['manualControls'];
		if (isset($this->settings['ff']['sync']) && strlen($this->settings['ff']['sync']) > 0)
			$this->settings['sync'] = $this->settings['ff']['sync'];
		if (isset($this->settings['ff']['asNavFor']) && strlen($this->settings['ff']['asNavFor']) > 0)
			$this->settings['asNavFor'] = $this->settings['ff']['asNavFor'];

		if (isset($this->settings['ff']['itemWidth']) && intval($this->settings['ff']['itemWidth']) > 0)
			$this->settings['itemWidth'] = $this->settings['ff']['itemWidth'];
		if (isset($this->settings['ff']['itemMargin']) && intval($this->settings['ff']['itemMargin']) > 0)
			$this->settings['itemMargin'] = $this->settings['ff']['itemMargin'];
		if (isset($this->settings['ff']['minItems']) && intval($this->settings['ff']['minItems']) > 0)
			$this->settings['minItems'] = $this->settings['ff']['minItems'];
		if (isset($this->settings['ff']['maxItems']) && intval($this->settings['ff']['maxItems']) > 0)
			$this->settings['maxItems'] = $this->settings['ff']['maxItems'];
		if (isset($this->settings['ff']['move']) && intval($this->settings['ff']['move']) > 0)
			$this->settings['move'] = $this->settings['ff']['move'];

		if (isset($this->settings['ff']['textmode']) && $this->settings['ff']['textmode'] != 'ts')
			$this->settings['textmode'] = $this->settings['ff']['textmode'];

	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {

		$contentObject = $this->configurationManager->getContentObject();
		$contentElement = $contentObject->data;

		$this->view->assign('uid', isset($contentElement['_LOCALIZED_UID']) ? $contentElement['_LOCALIZED_UID'] : $contentElement['uid']);
		$this->view->assign('settings', $this->settings);
		$this->view->assign('labels', $this->labels);
		$this->view->assign('images', $this->getCurrentImages());
	}


	protected function getCurrentImages() {
		$contentObject = $this->configurationManager->getContentObject();
		$contentElement = $contentObject->data;

		$images = array();
		$uid = isset($contentElement['_LOCALIZED_UID']) ? $contentElement['_LOCALIZED_UID'] : $contentElement['uid'];

		if (isset($uid)) { // Content Element
			$images = $this->imageRepository->findByUids($this->getImageIdsByContentUid($uid));
		} else if (isset($contentElement[0]) && !is_array(isset($contentElement[0]))) { // Fluid cObject data
			$images = $this->imageRepository->findByUids(t3lib_div::trimExplode(',', $contentElement[0], true));
		} else if (trim($this->configuration['images']) != '') { // TypoScript
			$images = $this->imageRepository->findByUids(t3lib_div::trimExplode(',', $this->configuration['images'], true));
		}

		return $images;
	}

	/**
	 *
	 * @param integer $uid
	 * @return array
	 */
	protected function getImageIdsByContentUid($uid) {
		$uids = array();
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('uid', 'tx_wsflexslider_domain_model_image', 'content_uid=' . intval($uid).' AND deleted=0 AND hidden=0', '', 'sorting');
		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res))
			$uids[] = (int) $row['uid'];
		return $uids;
	}

}
?>
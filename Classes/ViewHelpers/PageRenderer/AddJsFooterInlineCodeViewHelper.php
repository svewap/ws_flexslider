<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Sven Wappler <typo3YYYY@wapplersystems.de>
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
 * A view helper for adding inline JS Code
 *
 * @author Sven Wappler <typo3YYYY@wapplersystems.de>
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_WsFlexslider_ViewHelpers_PageRenderer_AddJsFooterInlineCodeViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractTagBasedViewHelper {


	/**
	 * Initialize
	 */
	public function initializeArguments() {
		$this->registerArgument('name', 'string', 'Name argument - see PageRenderer documentation', TRUE);
		$this->registerArgument('compress', 'boolean', 'Compress argument - see PageRenderer documentation', FALSE, TRUE);
		$this->registerArgument('forceOnTop', 'boolean', 'ForceOnTop argument - see PageRenderer documentation', FALSE, FALSE);
	}
	
	/**
	 * @var t3lib_PageRenderer
	 */
	protected $pageRenderer;
	
	/**
	 * @var Tx_Extbase_Configuration_ConfigurationManagerInterface
	 */
	protected $configurationManager;
	
	/**
	 * @param t3lib_PageRenderer $pageRenderer
	 */
	public function injectPageRenderer(t3lib_PageRenderer $pageRenderer) {
		$this->pageRenderer = $pageRenderer;
	}
	
	/**
	 * @param Tx_Extbase_Configuration_ConfigurationManagerInterface $configurationManager
	 * @return void
	 */
	public function injectConfigurationManager(Tx_Extbase_Configuration_ConfigurationManagerInterface $configurationManager) {
		$this->configurationManager = $configurationManager;
	}
	
	
	/**
	 * Returns TRUE if what we are outputting may be cached
	 *
	 * @return boolean
	 */
	protected function isCached() {
		$userObjType = $this->configurationManager->getContentObject()->getUserObjectType();
		return ($userObjType !== tslib_cObj::OBJECTTYPE_USER_INT);
	}
	
	
	/**
	 * Render
	 *
	 * @param string $block
	 */
	public function render() {
		if (!$block) {
			$block = $this->renderChildren();
		}
		
		if ($this->isCached()) {
			$this->pageRenderer->addJsFooterInlineCode(
					$this->arguments['name'],
					$block,
					$this->arguments['compress'],
					$this->arguments['forceOnTop']
			);
		} else {
			// additionalFooterData not possible in USER_INT
			$GLOBALS['TSFE']->additionalFooterData[md5($this->arguments['name'])] = t3lib_div::wrapJS($block);
		}
	}
	
}
<?php
namespace WapplerSystems\WsFlexslider\ViewHelpers\PageRenderer;

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


use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 *
 * A view helper for adding inline JS Code
 *
 * @author Sven Wappler <typo3YYYY@wapplersystems.de>
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class AddJsFooterInlineCodeViewHelper extends AbstractTagBasedViewHelper {


	/**
	 * Initialize
	 */
	public function initializeArguments() {
		$this->registerArgument('name', 'string', 'Name argument - see PageRenderer documentation', TRUE);
		$this->registerArgument('compress', 'boolean', 'Compress argument - see PageRenderer documentation', FALSE, TRUE);
		$this->registerArgument('forceOnTop', 'boolean', 'ForceOnTop argument - see PageRenderer documentation', FALSE, FALSE);
	}
	
	/**
	 * @var \TYPO3\CMS\Core\Page\PageRenderer
	 */
	protected $pageRenderer;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 */
	protected $configurationManager;
	
	/**
	 * @param \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer
	 */
	public function injectPageRenderer(\TYPO3\CMS\Core\Page\PageRenderer $pageRenderer) {
		$this->pageRenderer = $pageRenderer;
	}
	
	/**
	 * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
	 * @return void
	 */
	public function injectConfigurationManager(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager) {
		$this->configurationManager = $configurationManager;
	}
	
	
	/**
	 * Returns TRUE if what we are outputting may be cached
	 *
	 * @return boolean
	 */
	protected function isCached() {
		$userObjType = $this->configurationManager->getContentObject()->getUserObjectType();
		return ($userObjType !== ContentObjectRenderer::OBJECTTYPE_USER_INT);
	}
	
	
	/**
	 * Render
	 *
	 * @param string $block
	 */
	public function render() {
		$block = $this->renderChildren();

		
		if ($this->isCached()) {
			$this->pageRenderer->addJsFooterInlineCode(
					$this->arguments['name'],
					$block,
					$this->arguments['compress'],
					$this->arguments['forceOnTop']
			);
		} else {
			// additionalFooterData not possible in USER_INT
			$GLOBALS['TSFE']->additionalFooterData[md5($this->arguments['name'])] = GeneralUtility::wrapJS($block);
		}
	}
	
}
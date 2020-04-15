<?php
namespace WapplerSystems\WsFlexslider\Controller;

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

use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use WapplerSystems\WsFlexslider\Domain\Model\Content;
use TYPO3\CMS\Extbase\Configuration\FrontendConfigurationManager;

/**
 * @package ws_flexslider
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class FlexsliderController extends ActionController
{
    /**
     * @var \WapplerSystems\WsFlexslider\Domain\Repository\ImageRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $imageRepository;
    
    /**
     * @var \WapplerSystems\WsFlexslider\Domain\Repository\ContentRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $contentRepository;
    
    /**
     * initializes all Controller actions
     *
     * @return void
     */
    public function initializeAction()
    {
        $this->configuration = $this->settings['flexslider'];
        
        // Settings

        if (isset($this->settings['ff']['maxwidth']) && \strlen($this->settings['ff']['maxwidth']) > 0) {
            $this->settings['maxwidth'] = $this->settings['ff']['maxwidth'];
        }
        if (isset($this->settings['ff']['maxheight']) && \strlen($this->settings['ff']['maxheight']) > 0) {
            $this->settings['maxheight'] = $this->settings['ff']['maxheight'];
        }
        if (isset($this->settings['ff']['animation']) && $this->settings['ff']['animation'] !== 'ts') {
            $this->settings['animation'] = $this->settings['ff']['animation'];
        }
        if (isset($this->settings['ff']['easing']) && \strlen($this->settings['ff']['easing']) > 0) {
            $this->settings['easing'] = $this->settings['ff']['easing'];
        }
        if (isset($this->settings['ff']['direction']) && $this->settings['ff']['direction'] !== 'ts') {
            $this->settings['direction'] = $this->settings['ff']['direction'];
        }
        if (isset($this->settings['ff']['reverse']) && $this->settings['ff']['reverse'] !== 'ts') {
            $this->settings['reverse'] = $this->settings['ff']['reverse'];
        }
        if (isset($this->settings['ff']['animationLoop']) && $this->settings['ff']['animationLoop'] !== 'ts') {
            $this->settings['animationLoop'] = $this->settings['ff']['animationLoop'];
        }
        if (isset($this->settings['ff']['smoothHeight']) && $this->settings['ff']['smoothHeight'] !== 'ts') {
            $this->settings['smoothHeight'] = $this->settings['ff']['smoothHeight'];
        }
        if (isset($this->settings['ff']['startAt']) && (int)$this->settings['ff']['startAt'] > 0) {
            $this->settings['startAt'] = $this->settings['ff']['startAt'];
        }
        if (isset($this->settings['ff']['slideshow']) && $this->settings['ff']['slideshow'] !== 'ts') {
            $this->settings['slideshow'] = $this->settings['ff']['slideshow'];
        }
        if (isset($this->settings['ff']['slideshowSpeed']) && (int)$this->settings['ff']['slideshowSpeed'] > 0) {
            $this->settings['slideshowSpeed'] = $this->settings['ff']['slideshowSpeed'];
        }
        if (isset($this->settings['ff']['animationSpeed']) && (int)$this->settings['ff']['animationSpeed'] > 0) {
            $this->settings['animationSpeed'] = $this->settings['ff']['animationSpeed'];
        }
        if (isset($this->settings['ff']['initDelay']) && (int)$this->settings['ff']['initDelay'] > 0) {
            $this->settings['initDelay'] = $this->settings['ff']['initDelay'];
        }
        if (isset($this->settings['ff']['randomize']) && $this->settings['ff']['randomize'] !== 'ts') {
            $this->settings['randomize'] = $this->settings['ff']['randomize'];
        }
        if (isset($this->settings['ff']['pauseOnAction']) && $this->settings['ff']['pauseOnAction'] !== 'ts') {
            $this->settings['pauseOnAction'] = $this->settings['ff']['pauseOnAction'];
        }
        if (isset($this->settings['ff']['pauseOnHover']) && $this->settings['ff']['pauseOnHover'] !== 'ts') {
            $this->settings['pauseOnHover'] = $this->settings['ff']['pauseOnHover'];
        }
        if (isset($this->settings['ff']['useCSS']) && $this->settings['ff']['useCSS'] !== 'ts') {
            $this->settings['useCSS'] = $this->settings['ff']['useCSS'];
        }
        if (isset($this->settings['ff']['touch']) && $this->settings['ff']['touch'] !== 'ts') {
            $this->settings['touch'] = $this->settings['ff']['touch'];
        }
        if (isset($this->settings['ff']['video']) && $this->settings['ff']['video'] !== 'ts') {
            $this->settings['video'] = $this->settings['ff']['video'];
        }
        if (isset($this->settings['ff']['controlNav']) && $this->settings['ff']['controlNav'] !== 'ts') {
            $this->settings['controlNav'] = $this->settings['ff']['controlNav'];
        }
        if (isset($this->settings['ff']['directionNav']) && $this->settings['ff']['directionNav'] !== 'ts') {
            $this->settings['directionNav'] = $this->settings['ff']['directionNav'];
        }
        if (isset($this->settings['ff']['keyboard']) && $this->settings['ff']['keyboard'] !== 'ts') {
            $this->settings['keyboard'] = $this->settings['ff']['keyboard'];
        }
        if (isset($this->settings['ff']['multipleKeyboard']) && $this->settings['ff']['multipleKeyboard'] !== 'ts') {
            $this->settings['multipleKeyboard'] = $this->settings['ff']['multipleKeyboard'];
        }
        if (isset($this->settings['ff']['mousewheel']) && $this->settings['ff']['mousewheel'] !== 'ts') {
            $this->settings['mousewheel'] = $this->settings['ff']['mousewheel'];
        }
        if (isset($this->settings['ff']['pausePlay']) && $this->settings['ff']['pausePlay'] !== 'ts') {
            $this->settings['pausePlay'] = $this->settings['ff']['pausePlay'];
        }
        if (isset($this->settings['ff']['controlsContainer']) && \strlen($this->settings['ff']['controlsContainer']) > 0) {
            $this->settings['controlsContainer'] = $this->settings['ff']['controlsContainer'];
        }
        if (isset($this->settings['ff']['manualControls']) && \strlen($this->settings['ff']['manualControls']) > 0) {
            $this->settings['manualControls'] = $this->settings['ff']['manualControls'];
        }
        if (isset($this->settings['ff']['sync']) && \strlen($this->settings['ff']['sync']) > 0) {
            $this->settings['sync'] = $this->settings['ff']['sync'];
        }
        if (isset($this->settings['ff']['asNavFor']) && \strlen($this->settings['ff']['asNavFor']) > 0) {
            $this->settings['asNavFor'] = $this->settings['ff']['asNavFor'];
        }

        if (isset($this->settings['ff']['itemWidth']) && (int)$this->settings['ff']['itemWidth'] > 0) {
            $this->settings['itemWidth'] = $this->settings['ff']['itemWidth'];
        }
        if (isset($this->settings['ff']['itemMargin']) && (int)$this->settings['ff']['itemMargin'] > 0) {
            $this->settings['itemMargin'] = $this->settings['ff']['itemMargin'];
        }
        if (isset($this->settings['ff']['minItems']) && (int)$this->settings['ff']['minItems'] > 0) {
            $this->settings['minItems'] = $this->settings['ff']['minItems'];
        }
        if (isset($this->settings['ff']['maxItems']) && (int)$this->settings['ff']['maxItems'] > 0) {
            $this->settings['maxItems'] = $this->settings['ff']['maxItems'];
        }
        if (isset($this->settings['ff']['move']) && (int)$this->settings['ff']['move'] > 0) {
            $this->settings['move'] = $this->settings['ff']['move'];
        }
    }

    /**
     * action list
     *
     * @return void
     * @throws \TYPO3\CMS\Extbase\Persistence\Generic\Exception\UnsupportedMethodException
     */
    public function listAction()
    {
        $feConfigManager = $this->objectManager->get(FrontendConfigurationManager::class);
        $ts = $feConfigManager->getTypoScriptSetup();

        // Check Static include
        if (!isset($ts['plugin.']['tx_wsflexslider.']['view.']['templateRootPaths.'])) {
            $this->addFlashMessage('You have to include the static extension Template of the Flexslider.',
                'Missing template', AbstractMessage::ERROR);
        }
        
        $contentObject = $this->getTranslatedContentObject();

        $this->view->assign('uid', $contentObject->getUid());
        $this->view->assign('settings', $this->settings);
        $this->view->assign('images', $this->imageRepository->findByContentUid($contentObject->getUid()));
    }
    
    /**
     * Get tt_content record as translated object
     *
     * @return Content
     */
    protected function getTranslatedContentObject()
    {
        $contentObjectRecord = $this->configurationManager->getContentObject()->data;
        
        /** @var Content $contentObject */
        $contentObject = $this->contentRepository->findByIdentifier($contentObjectRecord['uid']);
        return $contentObject;
    }

}

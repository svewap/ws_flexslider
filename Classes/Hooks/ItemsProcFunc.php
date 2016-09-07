<?php

namespace WapplerSystems\WsFlexslider\Hooks;

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
use WapplerSystems\WsFlexslider\Utility\TemplateLayout;
use TYPO3\CMS\Backend\Utility\BackendUtility as BackendUtilityCore;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Userfunc to render alternative label for media elements
 *
 */
class ItemsProcFunc
{

    /** @var TemplateLayout $templateLayoutsUtility */
    protected $templateLayoutsUtility;

    public function __construct()
    {
        $this->templateLayoutsUtility = GeneralUtility::makeInstance(TemplateLayout::class);
    }

    /**
     * Itemsproc function to extend the selection of templateLayouts in the plugin
     *
     * @param array &$config configuration array
     * @return void
     */
    public function user_templateLayout(array &$config)
    {
        $row = $this->getContentElementRow($config['row']['uid']);

        $templateLayouts = $this->templateLayoutsUtility->getAvailableTemplateLayouts($row['pid']);
        foreach ($templateLayouts as $layout) {
            $additionalLayout = [
                $this->getLanguageService()->sL($layout[0], true),
                $layout[1]
            ];
            array_push($config['items'], $additionalLayout);
        }
    }


    /**
     * Get tt_content record
     *
     * @param int $uid
     * @return array
     */
    protected function getContentElementRow($uid)
    {
        return BackendUtilityCore::getRecord('tt_content', $uid);
    }

    /**
     * Returns LanguageService
     *
     * @return \TYPO3\CMS\Lang\LanguageService
     */
    protected function getLanguageService()
    {
        return $GLOBALS['LANG'];
    }

}
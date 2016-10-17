<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'WapplerSystems.' . $_EXTKEY,
	'Pi1',
	array(
		'Flexslider' => 'list',
		
	),
	// non-cacheable actions
	array(
		
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:ws_flexslider/Configuration/TSconfig/ContentElementWizard.txt">');


if (TYPO3_MODE === 'BE') {
    $icons = [
        'ext-wsflexslider-wizard-icon' => 'plugin_wizard.png',
    ];
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    foreach ($icons as $identifier => $path) {
        $iconRegistry->registerIcon(
            $identifier,
            \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
            ['source' => 'EXT:ws_flexslider/Resources/Public/Icons/' . $path]
        );
    }
}


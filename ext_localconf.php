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

?>
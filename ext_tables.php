<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

// Build extension name vars - used for plugin registration, flexforms and similar
$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'WS Flexslider'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Flexslider');



t3lib_extMgm::addLLrefForTCAdescr('tx_wsflexslider_domain_model_image', 'EXT:ws_flexslider/Resources/Private/Language/locallang_csh_tx_wsflexslider_domain_model_image.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_wsflexslider_domain_model_image');
$TCA['tx_wsflexslider_domain_model_image'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xml:tx_wsflexslider_domain_model_image',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,description,textposition,image,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Image.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/picture.png'
	),
);


$tempColumns = array(
		'tx_wsflexslider_images' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:ws_flexslider/Resources/Private/Language/locallang.xml:tx_wsflexslider_domain_model_flexslider.images',
				'config' => array(
						'type' => 'inline',
						'foreign_table' => 'tx_wsflexslider_domain_model_image',
						'foreign_field' => 'content_uid',
						'foreign_label' => 'title',
						'foreign_sortby' => 'sorting',
						'foreign_selector' => 'flexslider',
						'foreign_unique' => 'flexslider',
						'maxitems' => '100',
						'appearance' => array(
								#'collapseAll' => 0, // Auskommentieren, da es sonst immer als true interpretiert wird
								'expandSingle' => true,
								'newRecordLinkAddTitle' => 1,
								'newRecordLinkPosition' => “both”,
								'useCombination' => 1,
						),
				)
		),
);


t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content', $tempColumns, 1);

$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'tx_wsflexslider_images,pi_flexform';

t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForm/Flexslider.xml');

t3lib_extMgm::allowTableOnStandardPages('tx_wsflexslider_domain_model_image');

Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY, 'Pi1', 'Flexslider');




if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['Tx_WsFlexslider_Wizicon'] = t3lib_extMgm::extPath($_EXTKEY) . 'Classes/Wizicon.php';
}

?>
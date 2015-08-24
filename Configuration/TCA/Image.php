<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_wsflexslider_domain_model_image'] = array(
	'ctrl' => $TCA['tx_wsflexslider_domain_model_image']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, description, image',
	),
	'types' => array(
		'1' => array(
			'showitem' => 'hidden;;1, title, sys_language_uid, 
				description;LLL:EXT:cms/locallang_ttc.xlf:bodytext_formlabel;;richtext:rte_transform[flag=rte_enabled|mode=ts_css], 
				textposition, styleclass, link, image,
		
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_wsflexslider_domain_model_image',
				'foreign_table_where' => 'AND tx_wsflexslider_domain_model_image.pid=###CURRENT_PID### AND tx_wsflexslider_domain_model_image.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xml:tx_wsflexslider_domain_model_image.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'l10n_mode' => 'prefixLangTitle',
			'l10n_cat' => 'text',
			'exclude' => 0,
			'label' => 'LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xml:tx_wsflexslider_domain_model_image.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 10,
				'wizards' => array(
					'_PADDING' => 4,
					'_VALIGN' => 'middle',
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'title' => 'LLL:EXT:cms/locallang_ttc.xml:bodytext.W.RTE',
						'type' => 'script',
						'module' => array(
							'name' => 'wizard_rte'
						)
					)
				),
				'softref' => 'typolink_tag,images,email[subst],url',
			),
		),
		'textposition' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xml:tx_wsflexslider_domain_model_image.textposition',
			'config' => array(
				'type' => 'select',
				'items' => array(array('LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xml:tx_wsflexslider_domain_model_image.textposition_left',"left"),array('LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xml:tx_wsflexslider_domain_model_image.textposition_right',"right")),
			),
		),
		'styleclass' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xml:tx_wsflexslider_domain_model_image.styleclass',
			'config' => array(
				'type' => 'select',
				'items' => array(array('LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xml:tx_wsflexslider_domain_model_image.styleclass_style1',"style1"),array('LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xml:tx_wsflexslider_domain_model_image.styleclass_style2',"style2"),array('LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xml:tx_wsflexslider_domain_model_image.styleclass_style3',"style3"),array('LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xml:tx_wsflexslider_domain_model_image.styleclass_style4',"style4")),
			),
		),
		'link' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_link',
			'config' => array(
				'type' => 'input',
				'wizards' => array(
					'_PADDING' => 2,
					'link' => array(
						'type' => 'popup',
						'title' => 'LLL:EXT:cms/locallang_ttc.xml:image_link_formlabel',
						'icon' => 'link_popup.gif',
						'module' => array(
							'name' => 'wizard_element_browser',
							'urlParameters' => array(
								'mode' => 'wizard',
								'act' => 'file'
							)
						),
						'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
					),
				),
				'softref' => 'typolink[linkList]',
			),
		),
		'image' => array(
			'exclude' => 0,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xml:tx_wsflexslider_domain_model_image.image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'image',
				array(
					'minitems' => 0,
					'maxitems' => 1,
					'appearance' => array(
						'createNewRelationLinkTitle' => 'LLL:EXT:ws_flexslider/Resources/Private/Language/locallang.xml:add_image',
						'showAllLocalizationLink' => 1,
					),
					'foreign_match_fields' => array(
						'fieldname' => 'image',
						'tablenames' => 'tx_wsflexslider_domain_model_image',
						'table_local' => 'sys_file',
					),
					// custom configuration for displaying fields in the overlay/reference table
					// to use the newsPalette and imageoverlayPalette instead of the basicoverlayPalette
					'foreign_types' => array(
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
							'showitem' => '
								--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;newsPalette,
								--palette--;;imageoverlayPalette,
								--palette--;;filePalette'
						),
						
					)
				),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			)
			
		),
		'content_uid' => Array(
			'label' => 'CC',
			'config' => Array(
				'type' => 'select',
				'foreign_table' => 'tt_content',
				//'foreign_table_where' => ...,
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
	),
);

?>

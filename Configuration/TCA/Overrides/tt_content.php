<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', array(
    'tx_wsflexslider_images' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:ws_flexslider/Resources/Private/Language/locallang.xml:tx_wsflexslider_domain_model_flexslider.images',
        'config' => array(
            'type' => 'inline',
            'foreign_table' => 'tx_wsflexslider_domain_model_image',
            'foreign_field' => 'content_uid',
            'foreign_label' => 'title',
            'foreign_sortby' => 'sorting',
            'maxitems' => '100',
            'appearance' => array(
                #'collapseAll' => 0, // Auskommentieren, da es sonst immer als true interpretiert wird
                'expandSingle' => true,
                'newRecordLinkAddTitle' => 1,
                'newRecordLinkPosition' => "both",
                'showAllLocalizationLink' => true,
                'showPossibleLocalizationRecords' => true,
            ),
            'behaviour' => array(
                'localizationMode' => 'select',
                'localizeChildrenAtParentLocalization' => true,
            ),
        )
    ),
));



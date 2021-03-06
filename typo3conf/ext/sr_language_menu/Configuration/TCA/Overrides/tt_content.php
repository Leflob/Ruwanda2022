<?php
defined('TYPO3') or die();

call_user_func(
    function($extKey)
    {
		$tempColumns = array(
			'tx_srlanguagemenu_languages' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:sr_language_menu/Resources/Private/Language/locallang.xlf:settings.languages',
				'config' => array(
					'type' => 'group',
					'internal_type' => 'db',
					'allowed' => 'sys_language',
					'size' => '5',
					'maxitems' => 50,
					'minitems' => 1
				)
			),
			'tx_srlanguagemenu_type' => array(
				'exclude' => 0,
				'label' => 'LLL:EXT:sr_language_menu/Resources/Private/Language/locallang.xlf:settings.layout',
				'config' => array(
					'type' => 'select',
					'renderType' => 'selectSingle',
					'items' => array(
						array('LLL:EXT:sr_language_menu/Resources/Private/Language/locallang.xlf:settings.layout.I.0', '0'),
						array('LLL:EXT:sr_language_menu/Resources/Private/Language/locallang.xlf:settings.layout.I.1', '1'),
						array('LLL:EXT:sr_language_menu/Resources/Private/Language/locallang.xlf:settings.layout.I.2', '2')
					)
				)
			)
		);
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);
		
		$pluginSignature = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($extKey)) . '_languagemenu';
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('*', 'FILE:EXT:' . 'sr_language_menu' . '/Configuration/FlexForms/form.xml', $pluginSignature, 'menu');
		$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes'][$pluginSignature] = 'tx-srlanguagemenu-language';
		
		$coreLabelsSource = 'frontend/Resources/Private/Language/';
		$GLOBALS['TCA']['tt_content']['types'][$pluginSignature]['showitem'] = '--palette--;LLL:EXT:' . $coreLabelsSource . 'locallang_ttc.xml:palette.general;general';
		$GLOBALS['TCA']['tt_content']['types'][$pluginSignature]['showitem'] .= ', --palette--;LLL:EXT:' . $coreLabelsSource . 'locallang_ttc.xml:palette.headers;headers';
		$GLOBALS['TCA']['tt_content']['types'][$pluginSignature]['showitem'] .= ',--div--;LLL:EXT:sr_language_menu/Resources/Private/Language/locallang.xlf:settings.title, pi_flexform';
		$GLOBALS['TCA']['tt_content']['types'][$pluginSignature]['showitem'] .= ',--div--;LLL:EXT:' . $coreLabelsSource . 'locallang_ttc.xml:tabs.access, --palette--;LLL:EXT:' . $coreLabelsSource . 'locallang_ttc.xml:palette.visibility;visibility, --palette--;LLL:EXT:' . $coreLabelsSource . 'locallang_ttc.xml:palette.access;access';
		$GLOBALS['TCA']['tt_content']['types'][$pluginSignature]['showitem'] .= ', --div--;LLL:EXT:' . $coreLabelsSource . 'locallang_ttc.xml:tabs.appearance, --palette--;LLL:EXT:' . $coreLabelsSource . 'locallang_ttc.xml:palette.frames;frames';
		
		/**
		 * Registers the plugin to be listed in the Backend
		 */
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
			// The extension name (in UpperCamelCase) or the extension key (in lower_underscore)
			\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($extKey),
			// A unique name of the plugin in UpperCamelCase
			'LanguageMenu',
			// A title shown in the backend dropdown field
			'LLL:EXT:sr_language_menu/Resources/Private/Language/locallang.xlf:pi1_title',
			// Icon
			'tx-srlanguagemenu-language',
			// Group
			'menu'
		);
	},
	'sr_language_menu'
);
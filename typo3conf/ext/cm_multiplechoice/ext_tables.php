<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_cmmultiplechoice_domain_model_fragen', 'EXT:cm_multiplechoice/Resources/Private/Language/locallang_csh_tx_cmmultiplechoice_domain_model_fragen.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_cmmultiplechoice_domain_model_fragen');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_cmmultiplechoice_domain_model_antworten1', 'EXT:cm_multiplechoice/Resources/Private/Language/locallang_csh_tx_cmmultiplechoice_domain_model_antworten1.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_cmmultiplechoice_domain_model_antworten1');
})();

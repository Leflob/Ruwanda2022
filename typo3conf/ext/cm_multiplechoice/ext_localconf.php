<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'CmMultiplechoice',
        'Frontend',
        [
            \Cm\CmMultiplechoice\Controller\FragenController::class => 'index, list, show',
            \Cm\CmMultiplechoice\Controller\Antworten1Controller::class => 'index, list, show'
        ],
        // non-cacheable actions
        [
            \Cm\CmMultiplechoice\Controller\FragenController::class => '',
            \Cm\CmMultiplechoice\Controller\Antworten1Controller::class => ''
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    frontend {
                        iconIdentifier = cm_multiplechoice-plugin-frontend
                        title = LLL:EXT:cm_multiplechoice/Resources/Private/Language/locallang_db.xlf:tx_cm_multiplechoice_frontend.name
                        description = LLL:EXT:cm_multiplechoice/Resources/Private/Language/locallang_db.xlf:tx_cm_multiplechoice_frontend.description
                        tt_content_defValues {
                            CType = list
                            list_type = cmmultiplechoice_frontend
                        }
                    }
                }
                show = *
            }
       }'
    );
})();

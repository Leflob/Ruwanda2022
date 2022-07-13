<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'CmMulti',
        'Questionsfrontend',
        [
            \Cm\CmMulti\Controller\QuestionsController::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \Cm\CmMulti\Controller\QuestionsController::class => '',
            \Cm\CmMulti\Controller\AnswersController::class => ''
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    questionsfrontend {
                        iconIdentifier = cm_multi-plugin-questionsfrontend
                        title = LLL:EXT:cm_multi/Resources/Private/Language/locallang_db.xlf:tx_cm_multi_questionsfrontend.name
                        description = LLL:EXT:cm_multi/Resources/Private/Language/locallang_db.xlf:tx_cm_multi_questionsfrontend.description
                        tt_content_defValues {
                            CType = list
                            list_type = cmmulti_questionsfrontend
                        }
                    }
                }
                show = *
            }
       }'
    );
})();

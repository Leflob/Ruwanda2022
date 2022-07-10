<?php

declare(strict_types=1);

namespace Cm\CmMulti\Controller;


/**
 * This file is part of the "CM multiple choice" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Florian Böhm <s4flboeh@uni-trier.de>, Uni Trier
 */


/**
 * QuestionsController
 */
class QuestionsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * questionsRepository
     *
     * @var \Cm\CmMulti\Domain\Repository\QuestionsRepository
     */
    protected $questionsRepository = null;

    /**
     * @param \Cm\CmMulti\Domain\Repository\QuestionsRepository $questionsRepository
     */
    public function injectQuestionsRepository(\Cm\CmMulti\Domain\Repository\QuestionsRepository $questionsRepository)
    {
        $this->questionsRepository = $questionsRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $questions = $this->questionsRepository->findAll();
        $this->view->assign('questions', $questions);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Cm\CmMulti\Domain\Model\Questions $questions
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Cm\CmMulti\Domain\Model\Questions $questions): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('questions', $questions);
        return $this->htmlResponse();
    }
}

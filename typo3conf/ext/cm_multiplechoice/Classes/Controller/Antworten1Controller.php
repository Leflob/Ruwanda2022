<?php

declare(strict_types=1);

namespace Cm\CmMultiplechoice\Controller;


/**
 * This file is part of the "MultiQuiz" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */


/**
 * Antworten1Controller
 */
class Antworten1Controller extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * antworten1Repository
     *
     * @var \Cm\CmMultiplechoice\Domain\Repository\Antworten1Repository
     */
    protected $antworten1Repository = null;

    /**
     * @param \Cm\CmMultiplechoice\Domain\Repository\Antworten1Repository $antworten1Repository
     */
    public function injectAntworten1Repository(\Cm\CmMultiplechoice\Domain\Repository\Antworten1Repository $antworten1Repository)
    {
        $this->antworten1Repository = $antworten1Repository;
    }

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $antworten1s = $this->antworten1Repository->findAll();
        $this->view->assign('antworten1s', $antworten1s);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Cm\CmMultiplechoice\Domain\Model\Antworten1 $antworten1
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Cm\CmMultiplechoice\Domain\Model\Antworten1 $antworten1): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('antworten1', $antworten1);
        return $this->htmlResponse();
    }
}

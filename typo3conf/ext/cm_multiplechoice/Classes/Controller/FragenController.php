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
 * FragenController
 */
class FragenController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * fragenRepository
     *
     * @var \Cm\CmMultiplechoice\Domain\Repository\FragenRepository
     */
    protected $fragenRepository = null;

    /**
     * @param \Cm\CmMultiplechoice\Domain\Repository\FragenRepository $fragenRepository
     */
    public function injectFragenRepository(\Cm\CmMultiplechoice\Domain\Repository\FragenRepository $fragenRepository)
    {
        $this->fragenRepository = $fragenRepository;
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
        $fragens = $this->fragenRepository->findAll();
        $this->view->assign('fragens', $fragens);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Cm\CmMultiplechoice\Domain\Model\Fragen $fragen
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Cm\CmMultiplechoice\Domain\Model\Fragen $fragen): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('fragen', $fragen);
        return $this->htmlResponse();
    }
}

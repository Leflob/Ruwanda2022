<?php

declare(strict_types=1);

namespace Cm\CmMultiplechoice\Domain\Model;


/**
 * This file is part of the "MultiQuiz" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */


/**
 * Antworten1
 */
class Antworten1 extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * antwortText
     *
     * @var string
     */
    protected $antwortText = '';

    /**
     * Returns the antwortText
     *
     * @return string
     */
    public function getAntwortText()
    {
        return $this->antwortText;
    }

    /**
     * Sets the antwortText
     *
     * @param string $antwortText
     * @return void
     */
    public function setAntwortText(string $antwortText)
    {
        $this->antwortText = $antwortText;
    }
}

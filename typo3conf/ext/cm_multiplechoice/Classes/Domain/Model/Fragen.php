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
 * Fragenkatalog
 */
class Fragen extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * frageText
     *
     * @var string
     */
    protected $frageText = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * frageAntwort
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Cm\CmMultiplechoice\Domain\Model\Antworten1>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $frageAntwort = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->frageAntwort = $this->frageAntwort ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the frageText
     *
     * @return string
     */
    public function getFrageText()
    {
        return $this->frageText;
    }

    /**
     * Sets the frageText
     *
     * @param string $frageText
     * @return void
     */
    public function setFrageText(string $frageText)
    {
        $this->frageText = $frageText;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Adds a Antworten1
     *
     * @param \Cm\CmMultiplechoice\Domain\Model\Antworten1 $frageAntwort
     * @return void
     */
    public function addFrageAntwort(\Cm\CmMultiplechoice\Domain\Model\Antworten1 $frageAntwort)
    {
        $this->frageAntwort->attach($frageAntwort);
    }

    /**
     * Removes a Antworten1
     *
     * @param \Cm\CmMultiplechoice\Domain\Model\Antworten1 $frageAntwortToRemove The Antworten1 to be removed
     * @return void
     */
    public function removeFrageAntwort(\Cm\CmMultiplechoice\Domain\Model\Antworten1 $frageAntwortToRemove)
    {
        $this->frageAntwort->detach($frageAntwortToRemove);
    }

    /**
     * Returns the frageAntwort
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Cm\CmMultiplechoice\Domain\Model\Antworten1>
     */
    public function getFrageAntwort()
    {
        return $this->frageAntwort;
    }

    /**
     * Sets the frageAntwort
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Cm\CmMultiplechoice\Domain\Model\Antworten1> $frageAntwort
     * @return void
     */
    public function setFrageAntwort(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $frageAntwort)
    {
        $this->frageAntwort = $frageAntwort;
    }
}

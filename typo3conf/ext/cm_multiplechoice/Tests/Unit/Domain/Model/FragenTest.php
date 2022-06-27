<?php

declare(strict_types=1);

namespace Cm\CmMultiplechoice\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class FragenTest extends UnitTestCase
{
    /**
     * @var \Cm\CmMultiplechoice\Domain\Model\Fragen|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Cm\CmMultiplechoice\Domain\Model\Fragen::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getFrageTextReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getFrageText()
        );
    }

    /**
     * @test
     */
    public function setFrageTextForStringSetsFrageText(): void
    {
        $this->subject->setFrageText('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('frageText'));
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription(): void
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('description'));
    }

    /**
     * @test
     */
    public function getFrageAntwortReturnsInitialValueForAntworten1(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getFrageAntwort()
        );
    }

    /**
     * @test
     */
    public function setFrageAntwortForObjectStorageContainingAntworten1SetsFrageAntwort(): void
    {
        $frageAntwort = new \Cm\CmMultiplechoice\Domain\Model\Antworten1();
        $objectStorageHoldingExactlyOneFrageAntwort = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneFrageAntwort->attach($frageAntwort);
        $this->subject->setFrageAntwort($objectStorageHoldingExactlyOneFrageAntwort);

        self::assertEquals($objectStorageHoldingExactlyOneFrageAntwort, $this->subject->_get('frageAntwort'));
    }

    /**
     * @test
     */
    public function addFrageAntwortToObjectStorageHoldingFrageAntwort(): void
    {
        $frageAntwort = new \Cm\CmMultiplechoice\Domain\Model\Antworten1();
        $frageAntwortObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $frageAntwortObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($frageAntwort));
        $this->subject->_set('frageAntwort', $frageAntwortObjectStorageMock);

        $this->subject->addFrageAntwort($frageAntwort);
    }

    /**
     * @test
     */
    public function removeFrageAntwortFromObjectStorageHoldingFrageAntwort(): void
    {
        $frageAntwort = new \Cm\CmMultiplechoice\Domain\Model\Antworten1();
        $frageAntwortObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $frageAntwortObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($frageAntwort));
        $this->subject->_set('frageAntwort', $frageAntwortObjectStorageMock);

        $this->subject->removeFrageAntwort($frageAntwort);
    }
}

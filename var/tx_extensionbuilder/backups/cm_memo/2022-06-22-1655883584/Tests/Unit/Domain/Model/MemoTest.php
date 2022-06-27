<?php

declare(strict_types=1);

namespace Cm\CmMemo\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Flo <test@gmail.com>
 */
class MemoTest extends UnitTestCase
{
    /**
     * @var \Cm\CmMemo\Domain\Model\Memo|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Cm\CmMemo\Domain\Model\Memo::class,
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
    public function getTimestampReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getTimestamp()
        );
    }

    /**
     * @test
     */
    public function setTimestampForDateTimeSetsTimestamp(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setTimestamp($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('timestamp'));
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getTextReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getText()
        );
    }

    /**
     * @test
     */
    public function setTextForStringSetsText(): void
    {
        $this->subject->setText('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('text'));
    }
}

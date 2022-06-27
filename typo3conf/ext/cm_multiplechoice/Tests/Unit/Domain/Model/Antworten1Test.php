<?php

declare(strict_types=1);

namespace Cm\CmMultiplechoice\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class Antworten1Test extends UnitTestCase
{
    /**
     * @var \Cm\CmMultiplechoice\Domain\Model\Antworten1|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Cm\CmMultiplechoice\Domain\Model\Antworten1::class,
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
    public function getAntwortTextReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getAntwortText()
        );
    }

    /**
     * @test
     */
    public function setAntwortTextForStringSetsAntwortText(): void
    {
        $this->subject->setAntwortText('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('antwortText'));
    }
}

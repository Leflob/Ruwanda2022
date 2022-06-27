<?php

declare(strict_types=1);

namespace Cm\CmMultiplechoice\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 */
class Antworten1ControllerTest extends UnitTestCase
{
    /**
     * @var \Cm\CmMultiplechoice\Controller\Antworten1Controller|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Cm\CmMultiplechoice\Controller\Antworten1Controller::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllAntworten1sFromRepositoryAndAssignsThemToView(): void
    {
        $allAntworten1s = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $antworten1Repository = $this->getMockBuilder(\Cm\CmMultiplechoice\Domain\Repository\Antworten1Repository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $antworten1Repository->expects(self::once())->method('findAll')->will(self::returnValue($allAntworten1s));
        $this->subject->_set('antworten1Repository', $antworten1Repository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('antworten1s', $allAntworten1s);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenAntworten1ToView(): void
    {
        $antworten1 = new \Cm\CmMultiplechoice\Domain\Model\Antworten1();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('antworten1', $antworten1);

        $this->subject->showAction($antworten1);
    }
}

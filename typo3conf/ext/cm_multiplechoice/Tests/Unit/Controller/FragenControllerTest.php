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
class FragenControllerTest extends UnitTestCase
{
    /**
     * @var \Cm\CmMultiplechoice\Controller\FragenController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Cm\CmMultiplechoice\Controller\FragenController::class))
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
    public function listActionFetchesAllFragensFromRepositoryAndAssignsThemToView(): void
    {
        $allFragens = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $fragenRepository = $this->getMockBuilder(\Cm\CmMultiplechoice\Domain\Repository\FragenRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $fragenRepository->expects(self::once())->method('findAll')->will(self::returnValue($allFragens));
        $this->subject->_set('fragenRepository', $fragenRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('fragens', $allFragens);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenFragenToView(): void
    {
        $fragen = new \Cm\CmMultiplechoice\Domain\Model\Fragen();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('fragen', $fragen);

        $this->subject->showAction($fragen);
    }
}

<?php
namespace FluidTYPO3\Flux\Tests\Fixtures\Classes;

use FluidTYPO3\Flux\Builder\ViewBuilder;
use FluidTYPO3\Flux\Service\PageService;
use FluidTYPO3\Flux\Service\WorkspacesAwareRecordService;
use PHPUnit\Framework\MockObject\Generator;
use TYPO3\CMS\Core\Cache\Frontend\FrontendInterface;

class DummyPageService extends PageService
{
    public function __construct()
    {
        $this->workspacesAwareRecordService = $this->createMock(WorkspacesAwareRecordService::class);
        $this->runtimeCache = $this->createMock(FrontendInterface::class);
        $this->viewBuilder = $this->createMock(ViewBuilder::class);
    }

    public function setWorkspacesAwareRecordService(WorkspacesAwareRecordService $workspacesAwareRecordService): void
    {
        $this->workspacesAwareRecordService = $workspacesAwareRecordService;
    }

    public function setRuntimeCache(FrontendInterface $runtimeCache): void
    {
        $this->runtimeCache = $runtimeCache;
    }

    public function setViewBuilder(ViewBuilder $viewBuilder): void
    {
        $this->viewBuilder = $viewBuilder;
    }

    private function createMock(string $className): object
    {
        return (new Generator())->getMock($className, [], [], '', false);
    }
}

<?php

namespace News;

use News\Handler\ListNewsHandler;
use News\Handler\ListNewsHandlerFactory;
use News\Handler\ShowNewsHandler;
use News\Handler\ShowNewsHandlerFactory;
use News\Repository\NewsRepository;
use News\Repository\NewsRepositoryFactory;
use News\Repository\NewsRepositoryInterface;

/**
 * Class ConfigProvider
 *
 * @package News
 */
class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            'factories' => [
                ListNewsHandler::class => ListNewsHandlerFactory::class,
                ShowNewsHandler::class => ShowNewsHandlerFactory::class,

                NewsRepositoryInterface::class => NewsRepositoryFactory::class,
            ],
        ];
    }

    /**
     * @return array
     */
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'news' => [__DIR__ . '/../templates/news'],
            ],
        ];
    }
}

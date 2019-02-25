<?php

namespace News;

use News\Handler\ListNewsHandler;
use News\Handler\ListNewsHandlerFactory;

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

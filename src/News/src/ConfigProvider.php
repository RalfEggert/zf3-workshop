<?php

namespace News;

use News\Form\NewsForm;
use News\Handler\CreateNewsHandler;
use News\Handler\CreateNewsHandlerFactory;
use News\Handler\ListNewsHandler;
use News\Handler\ListNewsHandlerFactory;
use News\Handler\ShowNewsHandler;
use News\Handler\ShowNewsHandlerFactory;
use News\Repository\NewsRepositoryFactory;
use News\Repository\NewsRepositoryInterface;
use Zend\ServiceManager\Factory\InvokableFactory;

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
            'dependencies'  => $this->getDependencies(),
            'form_elements' => $this->getFormElements(),
            'templates'     => $this->getTemplates(),
        ];
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            'factories' => [
                ListNewsHandler::class   => ListNewsHandlerFactory::class,
                ShowNewsHandler::class   => ShowNewsHandlerFactory::class,
                CreateNewsHandler::class => CreateNewsHandlerFactory::class,

                NewsRepositoryInterface::class => NewsRepositoryFactory::class,
            ],
        ];
    }

    public function getFormElements()
    {
        return [
            'factories' => [
                NewsForm::class => InvokableFactory::class,
            ],
            'shared'    => [
                NewsForm::class => true,
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

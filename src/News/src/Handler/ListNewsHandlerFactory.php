<?php

namespace News\Handler;

use Interop\Container\ContainerInterface;
use News\Repository\NewsRepositoryInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ListNewsHandlerFactory
 *
 * @package News\Handler
 */
class ListNewsHandlerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null         $options
     *
     * @return ListNewsHandler
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ListNewsHandler
    {
        /** @var TemplateRendererInterface $template */
        $template = $container->get(TemplateRendererInterface::class);

        /** @var NewsRepositoryInterface $newsRepository */
        $newsRepository = $container->get(NewsRepositoryInterface::class);

        $handler = new ListNewsHandler();
        $handler->setTemplate($template);
        $handler->setNewsRepository($newsRepository);

        return $handler;
    }
}

<?php

namespace News\Handler;

use Interop\Container\ContainerInterface;
use News\Repository\NewsRepositoryInterface;
use Zend\Expressive\Helper\UrlHelper;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ShowNewsHandlerFactory
 *
 * @package News\Handler
 */
class ShowNewsHandlerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null         $options
     *
     * @return ShowNewsHandler
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var TemplateRendererInterface $template */
        $template = $container->get(TemplateRendererInterface::class);

        /** @var NewsRepositoryInterface $newsRepository */
        $newsRepository = $container->get(NewsRepositoryInterface::class);

        /** @var UrlHelper $urlHelper */
        $urlHelper = $container->get(UrlHelper::class);

        $handler = new ShowNewsHandler();
        $handler->setTemplate($template);
        $handler->setNewsRepository($newsRepository);
        $handler->setUrlHelper($urlHelper);

        return $handler;
    }
}

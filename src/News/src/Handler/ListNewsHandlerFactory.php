<?php

namespace News\Handler;

use Interop\Container\ContainerInterface;
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

        return new ListNewsHandler($template);
    }
}

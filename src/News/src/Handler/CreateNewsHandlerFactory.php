<?php

namespace News\Handler;

use Interop\Container\ContainerInterface;
use News\Form\NewsForm;
use News\Repository\NewsRepositoryInterface;
use Zend\Expressive\Helper\UrlHelper;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Form\FormElementManager\FormElementManagerV3Polyfill;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class CreateNewsHandlerFactory
 *
 * @package News\Handler
 */
class CreateNewsHandlerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null         $options
     *
     * @return CreateNewsHandler
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var FormElementManagerV3Polyfill $formElementManager */
        $formElementManager = $container->get('FormElementManager');

        /** @var TemplateRendererInterface $template */
        $template = $container->get(TemplateRendererInterface::class);

        /** @var NewsRepositoryInterface $newsRepository */
        $newsRepository = $container->get(NewsRepositoryInterface::class);

        /** @var NewsForm $newsForm */
        $newsForm = $formElementManager->get(NewsForm::class);

        /** @var UrlHelper $urlHelper */
        $urlHelper = $container->get(UrlHelper::class);

        return new CreateNewsHandler($newsForm, $newsRepository, $template, $urlHelper);
    }
}

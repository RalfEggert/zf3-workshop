<?php

namespace News\Repository;

use Interop\Container\ContainerInterface;
use News\InputFilter\NewsInputFilter;
use Zend\InputFilter\InputFilterPluginManager;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class NewsRepositoryFactory
 *
 * @package News\Repository
 */
class NewsRepositoryFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null         $options
     *
     * @return object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var InputFilterPluginManager $inputFilterManager */
        $inputFilterManager = $container->get(InputFilterPluginManager::class);

        $data = require PROJECT_PATH . '/data/news/data.php';

        /** @var NewsInputFilter $newsInputFilter */
        $newsInputFilter = $inputFilterManager->get(NewsInputFilter::class);

        return new NewsRepository($data, $newsInputFilter);
    }
}

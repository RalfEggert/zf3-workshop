<?php

namespace News\Repository;

use Interop\Container\ContainerInterface;
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
        $data = require PROJECT_PATH . '/data/news/data.php';

        return new NewsRepository($data);
    }
}

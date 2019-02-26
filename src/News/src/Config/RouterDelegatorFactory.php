<?php

namespace News\Config;

use Interop\Container\ContainerInterface;
use News\Handler\CreateNewsHandler;
use News\Handler\ListNewsHandler;
use News\Handler\ShowNewsHandler;
use Zend\Expressive\Application;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

/**
 * Class RouterDelegatorFactory
 *
 * @package News\Config
 */
class RouterDelegatorFactory implements DelegatorFactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string             $name
     * @param callable           $callback
     * @param array|null         $options
     *
     * @return Application
     */
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        /** @var Application $app */
        $app = $callback();

        $idOptions = ['constraints' => ['id' => '[1-9][0-9]*']];

        $app->get('/news', ListNewsHandler::class, 'news-list');
        $app->get('/news/:id', ShowNewsHandler::class, 'news-show')->setOptions($idOptions);
        $app->route('/news/create', CreateNewsHandler::class, ['GET', 'POST'], 'news-create');

        return $app;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: gibz
 * Date: 12.07.16
 * Time: 22:31
 */

namespace Warezgibzzz\QueryBusBundle\DependencyInjection;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class QueryBusExtension extends ConfigurableExtension
{
    private $alias;

    public function __construct($alias)
    {
        $this->alias = $alias;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getConfiguration(array $config, ContainerBuilder $container)
    {
        return new QueryBusConfiguration($this->getAlias());
    }

    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('query_bus.yml');
        $container->setAlias(
            'simple_bus.query_bus.query_name_resolver',
            'simple_bus.query_bus.' . $mergedConfig['query_name_resolver_strategy'] . '_query_name_resolver'
        );
        if ($mergedConfig['logging']['enabled']) {
            $loader->load('query_bus_logging.yml');
        }
    }
}
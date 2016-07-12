<?php
/**
 * Created by PhpStorm.
 * User: gibz
 * Date: 12.07.16
 * Time: 23:49
 */

namespace Gibzzz\QueryBusBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class QueryBusConfiguration implements ConfigurationInterface
{
    private $alias;

    public function __construct($alias)
    {
        $this->alias = $alias;
    }

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root($this->alias);
        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->enumNode('query_name_resolver_strategy')
                    ->values(['class_based', 'named_message'])
                    ->defaultValue('class_based')
                ->end()
                ->arrayNode('logging')
                    ->canBeEnabled()
                ->end()
            ->end();
        return $treeBuilder;
    }
}
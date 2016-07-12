<?php

namespace Warezgibzzz\QueryBusBundle;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Warezgibzzz\QueryBusBundle\DependencyInjection\Compiler\ConfigureMiddlewares;
use Warezgibzzz\QueryBusBundle\DependencyInjection\Compiler\RegisterHandlers;
use Warezgibzzz\QueryBusBundle\DependencyInjection\QueryBusExtension;

class WarezgibzzzQueryBusBundle extends Bundle
{
    private $configurationAlias;

    public function __construct($alias = 'query_bus')
    {
        $this->configurationAlias = $alias;
    }

    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(
            new ConfigureMiddlewares(
                'query_bus',
                'query_bus_middleware'
            )
        );
        $container->addCompilerPass(
            new RegisterHandlers(
                'simple_bus.query_bus.query_handler_map',
                'query_handler',
                'handles'
            )
        );
    }

    public function getContainerExtension()
    {
        return new QueryBusExtension($this->configurationAlias);
    }
}
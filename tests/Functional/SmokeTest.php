<?php

namespace Warezgibzzz\QueryBusBundle\Tests\Functional;

use Warezgibzzz\QueryBusBundle\Tests\Functional\SmokeTest\TestQuery;
use Warezgibzzz\QueryBusBundle\Tests\Functional\SmokeTest\TestKernel;

class SmokeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_returns_a_query_result()
    {
        $kernel = new TestKernel('test', true);
        $kernel->boot();
        $container = $kernel->getContainer();

        $queryBus = $container->get('query_bus');
        
        $request = new \stdClass('test');
        
        $query = new TestQuery();
        $query->request = clone $request;
        
        $queryResult = null;
        
        $queryBus->handle($query, $queryResult);

        $this->assertEquals($request, $queryResult);
        
        // it has logged some things
        $loggedMessages = file_get_contents($container->getParameter('log_file'));
        $this->assertContains('query_bus.DEBUG: Started handling a message', $loggedMessages);
        $this->assertContains('query_bus.DEBUG: Finished handling a message', $loggedMessages);
    }
}

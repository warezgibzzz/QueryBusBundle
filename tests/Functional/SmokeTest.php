<?php

namespace Warezgibzzz\QueryBusBundle\Tests\Functional;

use Warezgibzzz\QueryBusBundle\Tests\Functional\SmokeTest\TestQuery;
use Warezgibzzz\QueryBusBundle\Tests\Functional\SmokeTest\TestKernel;

class SmokeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_handles_a_query_then_dispatches_events_for_all_modified_entities()
    {
        $kernel = new TestKernel('test', true);
        $kernel->boot();
        $container = $kernel->getContainer();

        $queryBus = $container->get('query_bus');
        $query = new TestQuery();
        $queryBus->handle($query);

        $this->assertTrue($container->get('test_query_handler')->queryHandled);
        
        // some_other_test_query is triggered by test_event_handler
        $this->assertTrue($container->get('some_other_test_query_handler')->queryHandled);
        
        // it has logged some things
        $loggedMessages = file_get_contents($container->getParameter('log_file'));
        $this->assertContains('query_bus.DEBUG: Started handling a message', $loggedMessages);
        $this->assertContains('query_bus.DEBUG: Finished handling a message', $loggedMessages);
    }
}

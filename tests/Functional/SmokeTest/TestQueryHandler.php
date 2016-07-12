<?php

namespace Warezgibzzz\QueryBusBundle\Tests\Functional\SmokeTest;


class TestQueryHandler
{
    public function handle(TestQuery $query)
    {
        return $query->request;
    }
}

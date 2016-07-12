<?php

namespace Warezgibzzz\QueryBusBundle\Tests\Functional\SmokeTest;


class TestQueryHandler
{
    public $commandHandled = false;

    public function handle()
    {
        $this->commandHandled = true;
    }
}

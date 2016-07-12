<?php

namespace Warezgibzzz\QueryBusBundle\Tests\Functional\SmokeTest;

use Symfony\Bundle\MonologBundle\MonologBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;
use Warezgibzzz\QueryBusBundle\WarezgibzzzQueryBusBundle;

class TestKernel extends Kernel
{
    private $tempDir;

    public function __construct($environment, $debug)
    {
        parent::__construct($environment, $debug);

        $this->tempDir = sys_get_temp_dir() . '/' . uniqid();
        mkdir($this->tempDir, 0777, true);
    }

    public function registerBundles()
    {
        return array(
            new WarezgibzzzQueryBusBundle(),
            new MonologBundle()
        );
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config.yml');
    }

    public function getCacheDir()
    {
        return $this->tempDir . '/cache';
    }

    public function getLogDir()
    {
        return $this->tempDir . '/logs';
    }
}

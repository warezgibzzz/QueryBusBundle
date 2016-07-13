# QueryBusBundle

[![Build Status](https://travis-ci.org/warezgibzzz/QueryBusBundle.svg?branch=master)](https://travis-ci.org/warezgibzzz/QueryBusBundle)
[![Coverage Status](https://coveralls.io/repos/github/warezgibzzz/QueryBusBundle/badge.svg?branch=master)](https://coveralls.io/github/warezgibzzz/QueryBusBundle?branch=master)
[![Latest Stable Version](https://poser.pugx.org/warezgibzzz/query-bus-bundle/v/stable)](https://packagist.org/packages/warezgibzzz/query-bus-bundle)
[![Latest Unstable Version](https://poser.pugx.org/warezgibzzz/query-bus-bundle/v/unstable)](https://packagist.org/packages/warezgibzzz/query-bus-bundle)
[![Total Downloads](https://poser.pugx.org/warezgibzzz/query-bus-bundle/downloads)](https://packagist.org/packages/warezgibzzz/query-bus-bundle)
[![Monthly Downloads](https://poser.pugx.org/warezgibzzz/query-bus-bundle/d/monthly)](https://packagist.org/packages/warezgibzzz/query-bus-bundle)
[![Daily Downloads](https://poser.pugx.org/warezgibzzz/query-bus-bundle/d/daily)](https://packagist.org/packages/warezgibzzz/query-bus-bundle)

Description
===========

Query Bus bundle for Symfony2 adopting [AjglSimpleBusQueryBus](https://github.com/ajgarlag/AjglSimpleBusQueryBus) simple bus extension.
Codebase is based on [SymfonyBridge](https://github.com/SimpleBus/SymfonyBridge) SimpleBus bundle.

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require warezgibzzz/query-bus-bundle:dev-master
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Warezgibzzz\QueryBusBundle\WarezgibzzzQueryBusBundle(),
        );

        // ...
    }

    // ...
}
```

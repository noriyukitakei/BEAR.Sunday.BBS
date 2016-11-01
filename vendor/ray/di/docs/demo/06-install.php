<?php

use Ray\Di\AbstractModule;
use Ray\Di\Injector;

require __DIR__.'/bootstrap.php';

interface FinderInterface
{
}

class Finder implements FinderInterface
{
}

interface MovieListerInterface
{
}

class MovieLister implements MovieListerInterface
{
    public $finder;

    public function __construct(FinderInterface $finder)
    {
        $this->finder = $finder;
    }
}

class FinderModule extends AbstractModule
{
    protected function configure()
    {
        $this->bind(FinderInterface::class)->to(Finder::class);
        $this->bind(MovieListerInterface::class)->to(MovieLister::class);
    }
}

class InstallModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new FinderModule);
    }
}

$injector = new Injector(new FinderModule());
$movieLister = $injector->getInstance(MovieListerInterface::class);
/* @var $movieLister MovieLister */
$works = ($movieLister->finder instanceof Finder);

echo($works ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;

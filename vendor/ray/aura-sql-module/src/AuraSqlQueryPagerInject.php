<?php
/**
 * This file is part of the Ray.AuraSqlModule package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ray\AuraSqlModule;

use Ray\AuraSqlModule\Pagerfanta\AuraSqlQueryPagerFactoryInterface;

trait AuraSqlQueryPagerInject
{
    /**
     * @var AuraSqlQueryPagerFactoryInterface
     */
    protected $queryPagerFactory;

    /**
     * @param AuraSqlQueryPagerFactoryInterface $queryPagerFactory
     *
     * @\Ray\Di\Di\Inject
     */
    public function setAuraSqlQueryPager(AuraSqlQueryPagerFactoryInterface $queryPagerFactory)
    {
        $this->queryPagerFactory = $queryPagerFactory;
    }
}

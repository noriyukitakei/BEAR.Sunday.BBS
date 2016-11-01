<?php
/**
 * This file is part of the Koriym.Psr4List
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Koriym\Psr4List;

class SortingIterator implements \IteratorAggregate
{
    /**
     * @var \ArrayIterator
     */
    private $iterator;

    /**
     * @param \Traversable $iterator
     */
    public function __construct(\Traversable $iterator)
    {
        $array = iterator_to_array($iterator);
        usort($array, [$this, 'sort']);
        $this->iterator = new \ArrayIterator($array);
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return $this->iterator;
    }

    /**
     * @param \SplFileInfo $a
     * @param \SplFileInfo $b
     *
     * @return bool
     */
    public function sort(\SplFileInfo $a, \SplFileInfo $b)
    {
        $pathA = $a->getPathname();
        $pathB = $b->getPathname();
        $cntA = count(explode('/', $pathA));
        $cntB = count(explode('/', $pathB));
        if ($cntA !== $cntB) {
            return $cntA > $cntB;
        }
        return  $a->getPathname() > $b->getPathname();
    }
}

<?php
/**
 * This file is part of the BEAR.QueryRepository package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace BEAR\QueryRepository;

use BEAR\Resource\ResourceObject;

class FakeMobileEtagSetter extends MobileEtagSetter
{
    public static $device;

    public function __invoke(ResourceObject $resourceObject, $time = null)
    {
        self::$device =  $this->getDevice();

        return parent::__invoke($resourceObject, $time);
    }
}

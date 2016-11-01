<?php
namespace Ntakei\BearSundayDemo\Inject;

use Ray\Di\Di\Inject;
use Psr\Log\LoggerInterface;

trait LoggerInject
{
    protected $logger;

    /**
     * @Inject
     */
    public function setLogger(LoggerInterface $logger) 
    {
        $this->logger = $logger;
    }
}


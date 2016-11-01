<?php
namespace Ntakei\BearSundayDemo\Inject;

use Ntakei\BearSundayDemo\Service\UnauthenticatedService;
use Ray\Di\Di\Inject;

trait UnauthenticatedServiceInject
{
    protected $unauthenticatedService;

    /**
     * @Inject
     */
    public function setUnauthenticatedService(UnauthenticatedService $unauthenticatedService) 
    {
        $this->unauthenticatedService = $unauthenticatedService;
    }
}

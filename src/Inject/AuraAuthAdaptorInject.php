<?php
namespace Ntakei\BearSundayDemo\Inject;

use Ray\Di\Di\Inject;
use Aura\Auth\Adapter\AdapterInterface;

trait AuraAuthAdaptorInject
{
    protected $adaptor;

    /**
     * @Inject
     */
    public function setAdaptor(AdapterInterface $adaptor) 
    {
        $this->adaptor = $adaptor;
    }
}


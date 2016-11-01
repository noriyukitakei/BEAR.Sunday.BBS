<?php
namespace Ntakei\BearSundayDemo\Inject;

use Ntakei\BearSundayDemo\Service\MessageService;
use Ray\Di\Di\Inject;

trait MessageServiceInject
{
    protected $messageService;

    /**
     * @Inject
     */
    public function setMessageService(MessageService $messageService) 
    {
        $this->messageService = $messageService;
    }
}


<?php
/**
 * This file is part of the Ray.AuraSessionModule package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ray\AuraSessionModule;

use Aura\Session\SessionFactory;
use Ray\Di\ProviderInterface;

class SessionProvider implements ProviderInterface
{
    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function get()
    {
        return (new SessionFactory)->newInstance($_COOKIE);
    }
}

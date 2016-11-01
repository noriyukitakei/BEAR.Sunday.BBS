<?php
/**
 * This file is part of the BEAR.QueryRepository package.
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace BEAR\QueryRepository;

use BEAR\RepositoryModule\Annotation\Storage;
use BEAR\Resource\Annotation\AppName;
use Doctrine\Common\Cache\CacheProvider;
use Ray\Di\Di\Inject;
use Ray\Di\ProviderInterface;

class StorageProvider implements ProviderInterface
{
    /**
     * @var CacheProvider
     */
    private $kvs;

    /**
     * @var string
     */
    private $appName;

    /**
     * @param CacheProvider $kvs
     *
     * @Storage
     */
    public function __construct(CacheProvider $kvs)
    {
        $this->kvs = $kvs;
    }

    /**
     * @param string $appName
     *
     * @Inject
     * @AppName
     */
    public function setAppName($appName)
    {
        $this->appName = $appName;
    }

    /**
     * {@inheritdoc}
     */
    public function get()
    {
        $this->kvs->setNamespace($this->appName);

        return $this->kvs;
    }
}

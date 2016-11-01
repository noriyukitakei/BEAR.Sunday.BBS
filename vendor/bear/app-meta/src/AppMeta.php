<?php
/**
 * This file is part of the BEAR.AppMeta.
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace BEAR\AppMeta;

use BEAR\AppMeta\Exception\AppNameException;
use BEAR\AppMeta\Exception\NotWritableException;
use Koriym\Psr4List\Psr4List;

class AppMeta extends AbstractAppMeta
{
    /**
     * @param string $name    application application name    (Vendor.Package)
     * @param string $context application application context (prod-hal-app)
     */
    public function __construct($name, $context = 'app')
    {
        $appModule = $name . '\Module\AppModule';
        if (! class_exists($appModule)) {
            throw new AppNameException($name);
        }
        $this->name = $name;
        $this->appDir = dirname(dirname(dirname((new \ReflectionClass($appModule))->getFileName())));
        $this->tmpDir = $this->appDir . '/var/tmp/'. $context;
        if (! file_exists($this->tmpDir)) {
            mkdir($this->tmpDir);
        }
        $this->logDir = $this->appDir . '/var/log';
        $isNotProd = strpos($context, 'prod') === false;
        if ($isNotProd) {
            $this->initForDevelop($this->tmpDir);
            ini_set('error_log', $this->logDir . "/app.{$context}.log");
        }
    }

    /**
     * @return \Generator
     */
    public function getResourceListGenerator()
    {
        $list = new Psr4List;
        $resourceListGenerator = $list($this->name . '\Resource', $this->appDir . '/src/Resource');

        return $resourceListGenerator;
    }

    /**
     * @param string $dir
     */
    private function initForDevelop($dir)
    {
        $unlink = function ($path) use (&$unlink) {
            foreach (glob(rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . '*') as $file) {
                is_dir($file) ? $unlink($file) : unlink($file);
                @rmdir($file);
            }
        };
        $unlink($dir);
        if (function_exists('apc_clear_cache')) {
            apc_clear_cache('user');
        }
        $this->checkWritable();
    }

    /**
     * @codeCoverageIgnore*
     */
    private function checkWritable()
    {
        if (! is_writable($this->tmpDir)) {
            throw new NotWritableException($this->tmpDir);
        }
        if (! is_writable($this->logDir)) {
            throw new NotWritableException($this->logDir);
        }
    }
}

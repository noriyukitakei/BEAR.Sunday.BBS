<?php

namespace Module;

use BEAR\Resource\ImportApp;
use BEAR\Resource\Module\ImportAppModule;
use BEAR\Resource\ResourceInterface;
use FakeVendor\Sandbox\Module\AppModule;
use Ray\Di\Injector;

class ImportModuleTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $rm = function ($dir) use (&$rm) {
            foreach (glob($dir . '/*') as $file) {
                is_dir($file) ? $rm($file) : unlink($file);
                @rmdir($file);
            }
        };
        $tmpDir = dirname(dirname(__DIR__)) . '/tests/Fake/FakeVendor/Blog/var/tmp';
        $rm($tmpDir);
        file_put_contents($tmpDir . '/tmp.text', '1');
        parent::setUp();
    }

    public function testConfigure()
    {
        $module = new AppModule;
        $importConfig = [
            new ImportApp('blog', 'FakeVendor\Blog', 'app')
        ];
        $module->override(new ImportAppModule($importConfig));
        $resource = (new Injector($module))->getInstance(ResourceInterface::class);
        // request
        $news = $resource
            ->get
            ->uri('app://self/news')
            ->withQuery(['date' => 'today'])
            ->request();
        $expect = <<<EOT
{"weather":{"today":"the weather of today is sunny"},"headline":"40th anniversary of Rubik's Cube invention.","sports":"Pieter Weening wins Giro d'Italia.","user":{"id":2,"name":"Aramis","age":16,"blog_id":12}}
EOT;
        $this->assertSame($expect, (string) $news);

        $news = $resource
            ->get
            ->uri('app://blog/news')
            ->withQuery(['date' => 'today'])
            ->request();
        $expect = <<<EOT
{"weather":{"today":"the weather of today is sunny"},"technology":"Microsoft to stop producing Windows versions","user":{"id":3,"name":"Porthos","age":17,"blog_id":0}}
EOT;
        $this->assertSame($expect, (string) $news);
    }
}

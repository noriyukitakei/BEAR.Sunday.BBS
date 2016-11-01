<?php
/**
 * This file is part of the BEAR.Sunday package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace BEAR\Sunday\Provide\Router;

use BEAR\Sunday\Annotation\DefaultSchemeHost;
use BEAR\Sunday\Extension\Router\RouterInterface;
use BEAR\Sunday\Extension\Router\RouterMatch;

class WebRouter implements RouterInterface
{
    /**
     * @var string
     */
    private $schemeHost = 'page://self';

    /**
     * @param string $schemeHost
     *
     * @DefaultSchemeHost
     */
    public function __construct($schemeHost)
    {
        $this->schemeHost = $schemeHost;
    }

    /**
     * {@inheritdoc}
     */
    public function match(array $globals, array $server)
    {
        $request = new RouterMatch;
        $method = strtolower($server['REQUEST_METHOD']);
        list($request->method, $request->path, $request->query) = [
            $method,
            $this->schemeHost . parse_url($server['REQUEST_URI'], PHP_URL_PATH),
            ($method === 'get') ? $globals['_GET'] : $globals['_POST']
        ];

        return $request;
    }

    /**
     * {@inheritdoc}
     */
    public function generate($name, $data)
    {
        return false;
    }
}

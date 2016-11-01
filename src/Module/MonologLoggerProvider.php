<?php
namespace Ntakei\BearSundayDemo\Module;

use BEAR\AppMeta\AbstractAppMeta;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Ray\Di\ProviderInterface;
use Monolog\Formatter\LineFormatter;
use Ntakei\BearSundayDemo\Inject\AuthServiceInject;

class MonologLoggerProvider implements ProviderInterface
{
    use AuthServiceInject;

    private $appMeta;

    public function __construct(AbstractAppMeta $appMeta)
    {
        $this->appMeta = $appMeta;
    }

    public function get()
    {
        $log = new Logger('bbs');

        $dateFormat = "Y-m-d H:i:s";
        $output = "[%datetime%] %channel%.%level_name%: %request_id% %user_id% %message%\n";

        $formatter = new LineFormatter($output, $dateFormat);

        $stream = new StreamHandler($this->appMeta->logDir . '/bbs.log');

        $stream->setFormatter($formatter);

        $log->pushHandler($stream);

        $log->pushProcessor($this->getProcessor());

        return $log;
    }

    private function getProcessor()
    {
        return function ($record)
        {
            if (!isset($_SERVER["REQUEST_ID"]))
            {
                $_SERVER["REQUEST_ID"] = uniqid();
            }

            $record['request_id'] = $_SERVER["REQUEST_ID"];

            if ($this->authService->isLogin())
            {
                $record['user_id'] = $this->authService->getUserName();
            } else {
                $record['user_id'] = "";
            }

            return $record;
        };
    }
}
?>

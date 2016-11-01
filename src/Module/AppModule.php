<?php
namespace Ntakei\BearSundayDemo\Module;

use BEAR\Package\PackageModule;
use Ray\Di\AbstractModule;
use josegonzalez\Dotenv\Loader as Dotenv;
use Ntakei\BearSundayDemo\Service\MessageService;
use Ntakei\BearSundayDemo\Service\MessageServiceImpl;
use Ntakei\BearSundayDemo\Service\AuthService;
use Ntakei\BearSundayDemo\Service\AuthServiceImpl;
use Ntakei\BearSundayDemo\Form\MessageForm;
use Ntakei\BearSundayDemo\Form\LoginForm;
use Madapaja\TwigModule\TwigModule;
use Madapaja\TwigModule\Annotation\TwigPaths;
use Madapaja\TwigModule\Annotation\TwigOptions;
use Ray\WebFormModule\AuraInputModule;
use Ray\WebFormModule\FormInterface;
use BEAR\Package\Provide\Router\AuraRouterModule;
use Ray\AuraSqlModule\AuraSqlModule;
use Ntakei\BearSundayDemo\Interceptor\AuthInterceptor;
use Ntakei\BearSundayDemo\Interceptor\LogInterceptor;
use Ntakei\BearSundayDemo\Annotation\Log;
use Ntakei\BearSundayDemo\Resource\Page\Auth;
use Aura\Auth\Adapter\AdapterInterface;
use Aura\Auth\Adapter\AbstractAdapter;
use Ray\Di\Scope;
use Psr\Log\LoggerInterface;
use BEAR\Resource\ResourceObject;

class AppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        Dotenv::load([
            'filepath' => dirname(dirname(__DIR__)) . '/.env',
            'toEnv' => true
        ]);
        $this->install(new PackageModule);

        $this->install(new TwigModule);
        $appDir = dirname(dirname(__DIR__));
        $paths = [$appDir . '/var/twig'];
        $this->bind()->annotatedWith(TwigPaths::class)->toInstance($paths);  

        $this->install(new AuraInputModule());
        $this->bind(FormInterface::class)->annotatedWith('message_form')->to(MessageForm::class);
        $this->bind(FormInterface::class)->annotatedWith('login_form')->to(LoginForm::class);

        $this->bind(MessageService::class)->to(MessageServiceImpl::class)->in(Scope::SINGLETON);

        $this->bind(AuthService::class)->to(AuthServiceImpl::class)->in(Scope::SINGLETON);

        $this->override(new AuraRouterModule);

        $dbSetting = [
            'DB_DSN' => $_ENV["DB_DSN"],
            'DB_USERNAME' => $_ENV["DB_USERNAME"],
            'DB_PASSWORD' => $_ENV["DB_PASSWORD"],
        ];
        $this->bind()->annotatedWith('db_setting')->toInstance($dbSetting)->in(Scope::SINGLETON); 
        $this->bind(AdapterInterface::class)->toProvider(AuraAuthPdoAdaptorProvider::class)->in(Scope::SINGLETON);

        $this->install(
            new AuraSqlModule(
                $_ENV["DB_DSN"],
                $_ENV["DB_USERNAME"],
                $_ENV["DB_PASSWORD"]
            )
        );

        $this->bind(LoggerInterface::class)->toProvider(MonologLoggerProvider::class)->in(Scope::SINGLETON);

        $this->bindInterceptor(
            $this->matcher->SubclassesOf(Auth::class),
            $this->matcher->startsWith('on'),
            [AuthInterceptor::class]
        );
        $this->bindInterceptor(
            $this->matcher->any(),
            $this->matcher->annotatedWith(Log::class),
            [LogInterceptor::class]
        );

    }
}

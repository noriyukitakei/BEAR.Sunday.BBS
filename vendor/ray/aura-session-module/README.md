# Ray.AuraSessionModule

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ray-di/Ray.AuraSessionModule/badges/quality-score.png?b=1.x)](https://scrutinizer-ci.com/g/ray-di/Ray.AuraSessionModule/?branch=1.x)
[![Code Coverage](https://scrutinizer-ci.com/g/ray-di/Ray.AuraSessionModule/badges/coverage.png?b=1.x)](https://scrutinizer-ci.com/g/ray-di/Ray.AuraSessionModule/?branch=1.x)
[![Build Status](https://travis-ci.org/ray-di/Ray.AuraSessionModule.svg?branch=1.x)](https://travis-ci.org/ray-di/Ray.AuraSessionModule)

An [Aura.Session](https://github.com/auraphp/Aura.Session) module for [Ray.Di](https://github.com/ray-di/Ray.Di).

## Installation

### Composer install

    $ composer require ray/aura-session-module

### Module install

```php
use Ray\Di\AbstractModule;
use Ray\AuraSessionModule\AuraSessionModule;

class AppModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new AuraSessionModule);
    }
}
```

### Requirements

 * PHP 5.5+
 * hhvm

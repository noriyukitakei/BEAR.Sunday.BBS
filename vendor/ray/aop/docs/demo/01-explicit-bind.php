<?php

namespace Ray\Aop\Demo;

require __DIR__ . '/bootstrap.php';

use Ray\Aop\Bind;
use Ray\Aop\Compiler;

$compiler = new Compiler($_ENV['TMP_DIR']);
$bind = (new Bind)->bindInterceptors(
    'chargeOrder',        // method name
    [new WeekendBlocker]  // interceptors
);
$billingService = $compiler->newInstance(RealBillingService::class, [], $bind);

try {
    echo $billingService->chargeOrder();
    exit(0);
} catch (\RuntimeException $e) {
    echo $e->getMessage() . "\n";
    exit(1);
}

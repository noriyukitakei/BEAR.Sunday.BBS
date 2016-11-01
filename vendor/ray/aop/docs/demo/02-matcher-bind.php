<?php

namespace Ray\Aop\Demo;

use Ray\Aop\Bind;
use Ray\Aop\Compiler;
use Ray\Aop\Matcher;
use Ray\Aop\Pointcut;

require __DIR__ . '/bootstrap.php';

$pointcut = new Pointcut(
    (new Matcher)->any(),                   // class match
    (new Matcher)->startsWith('charge'),    // method match
    [new WeekendBlocker]                    // interceptors
);
$bind = (new Bind)->bind(RealBillingService::class, [$pointcut]);
$compiler = new Compiler($_ENV['TMP_DIR']);
$billingService = $compiler->newInstance(RealBillingService::class, [], $bind);

try {
    echo $billingService->chargeOrder();
} catch (\RuntimeException $e) {
    echo $e->getMessage() . "\n";
    exit(1);
}

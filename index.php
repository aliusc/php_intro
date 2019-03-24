<?php

namespace Nfq;


use Nfq\Akademija\Not_Typed;
use Nfq\Akademija\Soft;
use Nfq\Akademija\Strict;

require 'vendor/autoload.php';

echo 'calculateHomeWorkSum: '.calculateHomeWorkSum(3, 2.2, '1').'<br>'.PHP_EOL;
echo 'Nfq\Akademija\Not_Typed\calculateHomeWorkSum: '.Not_Typed\calculateHomeWorkSum(3, 2.2, '1').'<br>'.PHP_EOL;
echo 'Nfq\Akademija\Soft\calculateHomeWorkSum: '.Soft\calculateHomeWorkSum(3, 2.2, '1').'<br>'.PHP_EOL;
echo 'Nfq\Akademija\Strict\calculateHomeWorkSum: '.Strict\calculateHomeWorkSumFromOutside(3, 2.2, '1').'<br>'.PHP_EOL;


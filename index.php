<?php

require_once __DIR__ . '/vendor/autoload.php';

$date = new DateTime(); //<-entrypoint
$lotteryCalculator = new LotteryCalculator($date);
$nextDay = $lotteryCalculator->getNextDrawDate();

echo $nextDay->format('d-M-Y');
echo PHP_EOL;

$date = new DateTime('2019-01-09 19:59:59'); //<-entrypoint
$lotteryCalculator = new LotteryCalculator($date);
$nextDay = $lotteryCalculator->getNextDrawDate();

echo $nextDay->format('d-M-Y');

<?php

require_once __DIR__ . '/vendor/autoload.php';

$date = new DateTime(); 
$lotteryCalculator = new LotteryCalculator($date);
$nextDay = $lotteryCalculator->getNextDrawDate();

echo $nextDay->format('d-M-Y');
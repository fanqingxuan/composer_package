<?php

require_once __DIR__.'/vendor/autoload.php';

// Works with predefined scheduling definitions
$cron = Cron\CronExpression::factory('@daily');
var_dump($cron->isDue());
echo $cron->getNextRunDate()->format('Y-m-d H:i:s');
echo $cron->getPreviousRunDate()->format('Y-m-d H:i:s');

// Works with complex expressions
$cron = Cron\CronExpression::factory('3-59/15 2,6-12 */15 1 2-5');
echo $cron->getNextRunDate()->format('Y-m-d H:i:s');

// Calculate a run date two iterations into the future
$cron = Cron\CronExpression::factory('@daily');
echo $cron->getNextRunDate(null, 2)->format('Y-m-d H:i:s');


$cron = Cron\CronExpression::factory('* * * * *');
var_dump($cron->isDue());
var_dump($cron->getNextRunDate()->format('Y-m-d H:i:s'));
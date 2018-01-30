<?php 
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('Test');
$log->pushHandler(new StreamHandler('/tmp/your.log', Logger::WARNING));

// add records to the log
$log->warning('logging tests');
$log->error('Bar');
$log->info("Information");


global $log;

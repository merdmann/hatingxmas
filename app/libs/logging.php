<?php namespace core;

/* use Monolog; */
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


// create a log channel
$log = new Logger('Test');
$log->pushHandler(new StreamHandler('/tmp/your.log', Logger::INFO));
$GLOBALS["log"] = $log;


$log->info("start logging");

function info( $s ) {
    $log = $GLOBALS["log"];
    $log->info( "++++----- " . $s );
}

?>

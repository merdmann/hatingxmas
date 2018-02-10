<?php 

if(!defined('INCLUDED')) exit('This file cannot be opened directly');

/* use Monolog; */ 
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


// This is our test function


// Set our assert options
assert_options(ASSERT_ACTIVE,   1);
assert_options(ASSERT_BAIL,     0);
assert_options(ASSERT_WARNING,  0);
assert_options(ASSERT_CALLBACK, 'assert_callback');
assert_options(ASSERT_QUIET_EVAL, 0);



// create a log channel
$log = new Logger('Test');
$log->pushHandler(new StreamHandler('/tmp/your.log', Logger::INFO));
$GLOBALS["log"] = $log;

if( assert(true) ) {
    $log->info("Assertions are not active");
    ini_set("assert.active", "1");  /* will not help */
}

$log->info("Test started");

/* some test assert */
function test_assert($parameter)
{ 
    $log = $GLOBALS["log"];
    
    $log->info("test_assert called");
    
    assert('is_bool($parameter)');
}

function assert_callback( $script, $line, $message ) {
    $log = $GLOBALS["log"];
    
    $log->info("assert_callback called");
    
    $log->info( $script . " / " . $line . " / "  . $line );
    $log->info( $message );
}
 


 


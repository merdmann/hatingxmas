<?php 

use Monolog; 
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


// This is our test function


// Set our assert options
assert_options(ASSERT_ACTIVE,   true);
assert_options(ASSERT_BAIL,     1);
assert_options(ASSERT_WARNING,  1);
assert_options(ASSERT_CALLBACK, 'assert_callback');

// Make an assert that would failuse Monolog\Logger;

// create a log channel
$log = new Logger('Test');
$log->pushHandler(new StreamHandler('/tmp/your.log', Logger::INFO));
$GLOBALS["log"] = $log;

$log->info("Test started");

function test_assert($parameter)
{ 
    $log = $GLOBALS["log"];
    
    $log->info("test_assert called");
    
    assert('is_bool($parameter)', "There is something wrong");
}

function assert_callback( $script, $line, $message ) {
    $log = $GLOBALS["log"];
    
    $log->info("assert_callback called");
    
    $log->info( $script . line . $line );
    $log->info( $message );
}
 


 


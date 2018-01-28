<?php
/*
 * A collection of usefull functions
 */

function debug($message) {
    error_log($message);
}


function session_email() {
    $current_player = unserialize($_SESSION["current_player"]);
    $player = unserialize($_SESSION[ "player" ]);
    
    debug( "Player" . $current_player);
    
    
    
    $email = $player[$current_player]->property("email");
     
    return $email;
}

function decorate_session() {
    return "<span>" . session_email() . "</span>";
}

/*
 * load the properties file
 */
function loadProperties($name) {
    $vars = array();
    $file = "./data/" . $name . ".txt";
    if( !file_exists( $file ) )
        return false;
        
    $lines = explode("\n", file_get_contents($file));
        
    debug("loadProperties:" . vars);
    /* load the player data */
    foreach( $lines as $l) {
        $pair = explode(":", $l);
        
        $key = pair[0];
        $vars[ $key ] = $pair[1];
    };
    
    return vars;
}

/*
 * Store aSll properties in a files 
 */
function storeProperties($name, $vars) { 
    $line="";
    foreach( $vars as $k => $v) {
        $line=$line . "\n" . $k . ":" . $v;
    }

    $file = "./data/" . $name . ".txt";
    return file_put_contents($file, $line);
}


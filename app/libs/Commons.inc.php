<?php
/*
 * A collection of usefull functions
 * 
 * PLayer is an aray for each logged in player one element. THe session variavble 
 * current_player simply indicates the plazer which is currently active in the 
 * game.
 * 
 */

if(!defined('INCLUDED')) exit('This file cannot be opened directly');

require_once $_SERVER[DOCUMENT_ROOT] . '/vendor/autoload.php';
require_once $_SERVER[DOCUMENT_ROOT] . '/app/libs/assert.inc.php';

function session_email() {
    if( array_key_exists("current_player", $_SESSION) ) {    
        $current_player = unserialize($_SESSION["current_player"]);
  
        $player=unserialize($_SESSION[ "player" ]);
       
        
        assert( $player!==null, "player not set");
        assert( $current_player!==null, "current_player not set"); 
    
        $email = $player[$current_player]->property("email");
    }
    else {
        $email = "";
    }
     
    return $email;
}

function decorate_session() {
    return "<span>" . session_email() . "</span>";
}

/*
 * load the properties file
 */
function loadProperties($file) {
    $vars = array();
    
    assert( file_exists( $file ) == true, $file . "does not exist!" );
    
    $contents = file_get_contents($file);
    assert( $contents !== false, $file . "not loaded");
    
    if( !($contents === False) ) {
        $lines = explode("\n", $contents );

        /* load the properties file */
        foreach( $lines as $l) {
            if( strpos($l, ':') !==false ) {
                $pair = explode(":", $l);
            
                $key = $pair[0];
                $vars[ $key ] = $pair[1];
            }
        };
    }
    else {
        return false;
    }
   
    return $vars;
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


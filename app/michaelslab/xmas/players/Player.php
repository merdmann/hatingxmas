<?php namespace michaelslab\xmas\players;

/* if(!defined('INCLUDED')) exit('This file cannot be opened directly');*/

include 'app/libs/Commons.inc.php';

class Player
{
    public $name  = "";
    public $vars ;
 
 
    public function __construct($name,$email) {
        $this->vars  = array();
        $this->setProperty("email",$email);
        $this->setProperty("name", $name);
        $this->setProperty("points", 0);
        $this->setProperty("level", 0);
    }
    
    /*
     * load the players profile information
     */
    function loadPlayerProfile($name) {
        
        $file = "./data/" . $this->name . ".txt";
        if( !file_exists( $file ) )
            return false;
        
        $lines = explode("\n", file_get_contents($file));
     
        $this->vars = array_merge( loadProperties($file), $this->vars);
        $this->setProperty("name", $name);
        return true;
    }
    
    /*
     * store the profile informaton in the file system.
     */
    function storePlayerProfile($name) {
        
        $file = "./data/" . $this->name . ".txt";
        
        $line="";
        foreach( $this->vars as $k => $v) {
            $line=$line . "\n" . $k . ":" . $v;
        }
         
        return file_put_contents($file, $line);
    }
    
 
    function property($name) {
        return $this->vars[$name];
    }
    
    function setProperty($name, $value ) {
        return $this->vars[$name] = $value;
    }
    
    
    function setStartValue() {
        $this->level = 0;
        $this->points = 10;
        
    }
} /* class end */
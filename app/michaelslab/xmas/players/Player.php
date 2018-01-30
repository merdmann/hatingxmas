<?php namespace michaelslab\xmas\players;

/* if(!defined('INCLUDED')) exit('This file cannot be opened directly');*/

include  'app/libs/Commons.inc.php';

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
        $file = "./data/" . $name . ".txt";        
        $p = loadProperties($file);
        var_dump($p);
        
        if( $p === False )
            $p = array();
            
        $this->vars = array_merge( $this->vars, $p);
        $this->setProperty("name", $name);
        return true;
    }
    
    /*
     * store the profile informaton in the file system.
     */
    function storePlayerProfile($name) {
       
        $file = "./data/" . $this->name . ".txt";
        
       
        return storeProperties($name, $this->vars);
    }
    
 
    function property($name) {
        if(array_key_exists($name, $this->vars) ) {
            return $this->vars[$name];
        }
        else {
            return false;
        }
        
    }
    
    function setProperty($name, $value ) {
        return $this->vars[$name] = $value;
    }
    
    
    function setStartValue() {
        $this->level = 0;
        $this->points = 10;
        
    }
} /* class end */
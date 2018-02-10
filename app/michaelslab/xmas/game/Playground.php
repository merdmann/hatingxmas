<?php namespace michaelslab\xmas\game;

require_once $_SERVER[DOCUMENT_ROOT] . '/app/libs/logging.php';

use core as core;

class Playground 
{
    public $day = array();
    
    function __construct() {
        core\info("PLayground constructor called");
        $this->day = array(24);    
    }

    public function advance() {
        core\info("advance");
    }
    
    public function draw() {
        core\info("draw");
    }
}/* class end */
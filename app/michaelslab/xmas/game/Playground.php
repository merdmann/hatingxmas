<?php namespace michaelslab\xmas\game;

require_once $_SERVER[DOCUMENT_ROOT] . '/app/libs/logging.php';

use core as core;

class Playground 
{
    public $day = array();
    public $days = 0;
    
    function __construct($size) {
        $this->days = $size;
        core\info("PLayground constructor called " . $this->days);
        $this->day = array($this->days);    
    }

    public function advance() {
        core\info("advance");
    }
    
    
    
    function placeTile( $x, $y, $size, $tile ) {
        $file = $_SERVER[DOCUMENT_ROOT] . '/img/' . $tile;
        
        core\info( "Tile filler " . "'" . $file . "'");
        
        echo($GLOBALS["html"]->img( $file,
            array( 'height'=> $size,
                   'id' => 'xmas',
                   'style'=>'position: absolute; visibility: visible; left:'. $x*$size .'px; top:' .$y*$size .'px; z-index: 200;')));
    }
    
    
    public function draw() {
        core\info("Draw PLayground");
        $dayOfQWeek = 1;
        $week = 1;
        
        for($day=0; $day< $this->days; $day++) {
            $dayOfWeek++;
            if( $dayOfWeek == 8) {
                $week++;
                $dayOfWeek = 1;
            }
            
            $x = $y = 0;
                     
            switch( $week){
                case 1:
                    $x = $dayOfWeek;
                    $y = 1;
                    break;
                case 2:
                    $x = 7;
                    $y = $dayOfWeek;
                    break;
                case 3:
                    $y = 7;
                    $x = $dayOfWeek;
                    break;
                case 4:
                    $x = 1;
                    $y = $dayOfWeek;
                    break;
            }
            core\info( "week: " . $week . ", " . $dayOfWeek .", x:" . $x . ", y:" . $y);
           
            $this->placeTile( $x, $y, 300, "images.png"  );
            
        }
    }
}/* class end */
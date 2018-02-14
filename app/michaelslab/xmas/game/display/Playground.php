<?php namespace michaelslab\xmas\game\display;

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use core as core;

class Playground 
{
    public $day = array();
    public $days = 0;
    
    const TILE_SIYZE = 80; 
    
    function __construct($size) {
        $this->days = $size;
        core\info("PLayground constructor called " . $this->days);
        $this->day = array($this->days);    
    }

    public function advance() {
        core\info("advance");
    }
    
    function placeText( $text, $day, $size ) {
      
        $pos = $this->day2coordinates( $day );
        
        $y   = $pos["y"] * $size + 90;
        $x   = $pos["x"] * $size;
        
        echo($GLOBALS["html"]->div( "Text:" . $text, array( 
                'id' => $day,
                'style'=>'position: absolute; visibility: visible; left:'. $x .'px; top:' . $y .'px; z-index: 200')));
    }
    
    
    function placeTile( $x, $y, $day, $size, $tile ) {
        $file = /*$_SERVER[DOCUMENT_ROOT] .*/ './img/' . $tile;
        
        core\info( "Tile filler " . "'" . $file . "'");
        $file = /*$_SERVER[DOCUMENT_ROOT] .*/ './img/' . $tile;
        
        echo($GLOBALS["html"]->img( $file,
            array( 'height'=> $size,
                   'id' => $day,
                   'onclick' => "click_handler(" . $day . ")",
                   'style'=>'position: absolute; visibility: visible; left:'. $x*$size .'px; top:' . (90+$y*$size) .'px; z-index: 200')));
    }
    
    function placeTileByDay( $day, $size, $tile ) {
        $result =$this->day2coordinates( $day );
        
        $this->placeTile( $result["x"], $result["y"], $day, $size, $tile );
    }
    
    function day2coordinates($day) {
        $result = array(2); 
    
        $x = $y = 0;
        $week = floor( $day/7 );
        $dayOfWeek = $day % 7;
    
        switch( $week ) {
            case 0:
                $x = $dayOfWeek;
                $y = 0;
                break;
            case 1:
                $x = 7;
                $y = $dayOfWeek;
                
                break;
            case 2:
                $y = 7;
                $x = $dayOfWeek;
                break;
            case 3:
                $x = 0;
                $y = $dayOfWeek;
                break;
        }
        
        core\info( "day: " . $day . ", week: " . $week . " ==> [x:" .$x . ",y:" . $y . "]" );
       
        return array("x" => $x, "y" => $y);
    }
    
    public function draw() {
        core\info("Draw PLayground");
        $dayOfWeek = 1;
        $week = 1;
        
        for($day=0; $day<= $this->days; $day++) {
            $result = $this->day2coordinates($day);
            $x = $result["x"];
            $y = $result["y"]  + TIlE_SIZE ;
            core\info( "week: " . $week . ", " . $dayOfWeek .", x:" . $x . ", y:" . $y);
           
            $this->placeTile( $x, $y, $day, 80, "images.png"  );        
        }
        
        for($day=1; $day<=$this->days; $day++) {
            $this->placeText($day, $day, 80);
            $this->placeTileByDay($day, 80, "monster1.jpeg");
        }
    } /* draw end */
            
}/* class end */
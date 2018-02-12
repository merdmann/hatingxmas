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
        
        $this->placeTile( result["x"], result["y"], $day, $size, $tile );
    }
    
    
    function day2coordinates($day) {
        $result = array(2); 
    
        $week = ceil( $day/7 );
        $dayOfQWeek = $day % 7;
    
        switch( $week ) {
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
        
        core\info( "x:" .$x . "y:" . $y );
       
        return array( "x" => $x, "y" => $y);
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
           
            $this->placeTile( $x, $y, $day, 80, "images.png"  );
            
        }
        
        for($day=1; $day<$this->days; $day++) {
            $this->placeText($day, $day, 80);
            $this->placeTileByDay($day, 80, "monster1.jpeg");
        }
    } /* draw end */
            
}/* class end */
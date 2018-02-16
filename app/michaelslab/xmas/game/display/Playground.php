<?php namespace michaelslab\xmas\game\display;

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use core as core;

class Playground 
{
    public $day = array();
    public $days = 0;       // the number of day
    public $tiles = array(
        "download.jpeg",
        "freeonline.jpeg",
        "free.png",
        "full.jpeg",
        "iloveshopping.jpeg",
        "images.png",
        "love.jpeg",
        "monster1.jpeg",
        "monster2.jpeg",
        "monster3.jpeg",
        "monster4.jpg",
        "monster5.jpeg",
        "santaclaus.jpeg",
        "seller.jpeg",
        "tolate.png"
        );
        
    
    const TILE_SIZE = 80; 
    CONST BASE_Y = 1.5 * self::TILE_SIZE;
    const BASE_X = self::TILE_SIZE;

    function __construct($size) {
        $this->days = $size;
        core\info("PLayground constructor called " . $this->days);
        $this->day = array($this->days);
        
        for($i=0; $i<$this->days; $i++) {
            $this->day[$i] = rand(0,13);
            core\info( "day[". $i . "] = " . $this->day[ $i ]);
        }
        
        core\info("constructoer done");
    }

    /**
     * moving advance the named player 
     */
    public function advance() {
        
    }
    
    /* calculate the location of a tile */
    function tile2Screen($x, $y ) {
        $result = array(2);
        
        $y = $y*self::TILE_SIZE + self::BASE_Y;
        $x = $x*self::TILE_SIZE + self::BASE_X; 
        
        $result["x"] = $x;
        $result["y"] = $y;
        
        
        return $result;
    }
   
    /* 
     * place the text in the cell of the date
     */ 
    function placeTextByDay( $text, $day ) {
        $pos = $this->day2Tile( $day );
        $pos = $this->tile2Screen($pos["x"], $pos["y"]);
        
        $y   = $pos["y"];
        $x   = $pos["x"];
        
        echo($GLOBALS["html"]->div( "Text:" . $text, array( 
                'id' => $day,
                'style'=>'position: absolute; visibility: visible; left:'. $x .'px; top:' . $y .'px; z-index: 200')));
    }
    
    
    function placeTileOnScreen( $x, $y, $day, $tile ) {
        $file =  './img/' . $tile;
        
        $x = $x + self::BASE_X;
        $y = $y + self::BASE_Y;
        
        core\info("day" . $day . "," . $x . "," . $y );
        
        echo($GLOBALS["html"]->img( $file,
            array( 'height'=> self::TILE_SIZE,
                   'id' => $day,
                   'onclick' => "click_handler(" . $day . ")",
                   'style'=>'position: absolute; visibility: visible; left:'. $x .'px; top:' . $y .'px; z-index: 200')));
    }
    
    function placeTileByDay( $day, $tile ) {
        $result =$this->day2Tile( $day );
        $result =$this->tile2Screen( $result["x"], $result["y"]);
      
        core\info("x: " . $result["x"] . ", y:" . $result["y"] );
        $this->placeTileOnScreen( $result["x"], $result["y"], $day, $tile );
    }
    
    function day2Tile($day) {
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
        core\info("Draw PLayground " . $this->days);
   
        for($day=0; $day<=$this->days; $day++) {
            core\info("file ". $day .", " . $this->day[$day]);
            $file = $this->tiles[$this->day[$day]];
            
            core\info($file);
            
            $this->placeTileByDay($day, $this->tiles[$this->day[$day]]);
        }
   
    } /* draw end */
    
    
            
}/* class end */
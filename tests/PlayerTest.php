<?php 

require_once  __DIR__  .  './../vendor/autoload.php';


use michaelslab\xmas\game as game;
use michaelslab\xmas\players as players;
use PHPUnit\Framework\TestCase;

include __DIR__ . "/../app/libs/assert.inc.php";


/*include __DIR__ . "./../app/libs/Commons.inc.php"*/

class PlayerTest extends PHPUnit_Framework_TestCase
{
	public $p;

	public function testPropertiesGeneratedByClass() {
	    $p = new michaelslab\xmas\players\Player(  "michael", "xxx@yyy");
    	$this->assertEquals( $p->property("name"), "michael", "name is wrong");
    	$this->assertEquals( $p->property("email"), "xxx@yyy", "email is wrong");
	}

	public function testProperiesGetAndSet() {
	    $p = new michaelslab\xmas\players\Player("michael", "xxx@yyy");
	    
	    $p->setProperty("points", 6988 );
	    $this->assertEquals( $p->property("points"), 6988, "point not matching expected");
	}

	public function testStoreProfile() {
		 $p = new michaelslab\xmas\players\Player("michael", "xxx@yyy");
	
		 $p->setProperty( "mylevel", "11111" );
	     $p->storePlayerProfile( "testIt" );
	     $p->loadPlayerProfile( "testIt");
	     $this->assertEquals( $p->property("myLevel"), FALSE, "stored and read property do not match"); 
	}
	
	public function testPLayerFiles() {
	         $result = assert( "1 === 3" );
	         
	         $this->markTestIncomplete(
	             'This test has not been implemented yet.'
	             );
	         var_dump($GLOBAL);
	}
	public function testPlaceTiles() {
	    $playground = new michaelslab\xmas\game\display\Playground(28);
	}
}



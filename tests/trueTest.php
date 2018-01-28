<?php 

require_once __DIR__  .  './../vendor/autoload.php';

use michaelslab\xmas\players as players;
use PHPUnit\Framework\TestCase;

class PlayerTest extends PHPUnit_Framework_TestCase
{
	public $p;

	public function testPropertiesGeneratedByClass() {
	    $p = new michaelslab\xmas\players\Player("michael", "xxx@yyy");
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
	
		 $p->setProperty( "mylevel", 11111 );
	     $p->storePlayerProfile( "testIt" );
	     $p->loadPlayerProfile( "testIt");
	     $this->assertEqual( $p->property("myLevel"), 11111, "Somethig is wrong"); 

	}
}
<div class="container-fluid">
  <div class="row-fluid">
   <!--	<link href="signin.css" rel="stylesheet"> -->
   
    <div class="container">
      <form class="form-signin"  action="admin/login" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" id="inGameName" name="name" class="form-control" placeholder="in game name" required autofocus>
        <label for="inGameName" class="sr-only">your in game name</label>
        
        <input type="text" id="inputEmail" name="email" class="form-control" placeholder="someomne@somewhere.com" required>
        <label for="inputEmail" class="sr-only">Email address</label>
        
        <div class="checkbox">
          <label>
            <input type="checkbox" name="new-player"> New Player
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
	</div>
</div>
</div>

<?php

require_once $_SERVER[DOCUMENT_ROOT] . '/vendor/autoload.php';
require_once $_SERVER[DOCUMENT_ROOT] . '/app/libs/assert.inc.php';

use michaelslab\xmas\players\Player as _Player;

if( array_key_exists( "name", $_POST) ) {
    global $current_player;
    global $player;
    $html = $GLOBALS['html'];
       
    if( ! array_key_exists("claus", $player )) {
        $player["claus"] = new _Player("xmas", "xmas@xmas.com");
    };
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $newplayer = $_POST["new-player"];
    
    $player[$name] = new _Player($name, $email);
    $player[$name]->setProperty("email", $email);
    
    // player profiles
    if( !$player[$name]->loadPlayerProfile($name, $email)) {
        /* The player profile is to be set to the initial settings and store is */  
        $player[$name]->setStartValue();
        $player[$name]->storePlayerProfile($name);
    }
    $current_player = $name;
    
    echo( "<p>" . $current_player . ' has been loaded successfully' . "<p>");
    /* debug( $current_player . '/' . $email . ' has been loaded successfully');*/
    
    session_destroy();
    
    storeProperties($name, $player[$name]->vars);
    session_start();
    $_SESSION['current_player'] = serialize( $current_player );
    $_SESSION['player'] = serialize( $player );
   
    $html->redirect('admin/greeter');
}
else {   
    assert(False,"post returned no name");
}


?>





<?php
require_once $_SERVER[DOCUMENT_ROOT] . '/vendor/autoload.php';
require_once $_SERVER[DOCUMENT_ROOT] . '/app/libs/assert.inc.php';

$current_player = unserialize($_SESSION["current_player"]);
$player = unserialize($_SESSION[ "player" ]);


$email = $player[$current_player]->email;
?>

<span class="h2">Greetings <?php echo(  $current_player . ", your email is: " . session_email() ) ?></span>



<?php 
    $files = scandir("./data" );
?>
	<table class="scorelist">
	<tbody class="scorecell">
    <tr>
       <th>Name</th>
       <th>email</th>
       <th>Points</th>
    </tr>  
<?php       
    foreach( $files as $f) {
        if( $f != "." && $f != '..' ) {
            $name = $_SERVER[DOCUMENT_ROOT] . "/./data/" . $f;
            
            if(substr( $f, ".", 0, 1 ) !== ".") {
                $p = loadProperties( $name );
               
                /* assert( $p != False, "Could not load property files" ); */
            
                echo('<tr><td class="">' . $f . '</td><td>' . $p["email"] . '<td class="">' . $p["points"] . "</td></tr>");
            };
        };        
    };
?>
      </tbody>
	</table>
	<p>
	
	
	<a href="http://localhost:8080/play/start" class="button">start</a>
	
    </p>	

    <script type="text/javascript">

 
	</script>
 
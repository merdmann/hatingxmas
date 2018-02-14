<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Congratulations still hate xmas</h1>


Welcome <?php echo $_GET["name"]; ?><br>
Your email address is: <?php echo $_GET["email"]; ?>

<div>
<span id="xpos">X   </span>
<span id="ypos">Y   </span>
</div>
<?php 
// again one of the trivial tasks of life.
$xdate = mktime(0, 0, 0, 12, 24, 2018);
$today = time();

$tillxmas = $xdate - $today;
$size = 500.0 * ( 1.0 - $tillxmas / 365);

$html = $GLOBALS["html"];

echo ('<p>till xmas are '. floor($tillxmas/60/60/24) . ' days remaining</p>' );

function drawKillingField() {
    for($row=0; $row < 6; $row++) {
            placeTile($row, $col, 80, "santaclaus.jpeg");
    }
}
    


function placeTile( $x, $y, $size, $tile ) {
    
    $file = $_SERVER[DOCUMENT_ROOT] . '/img/' . $tile;
    
    echo($html->img( $file,   
           array( 'height'=> $size,
                  'id' => 'xmas',
                  'style'=>'position: absolute; visibility: visible; left:'. $x .'px; top:' .$y .'px; z-index: 200;'))); 
}



?>

<div class="killing-field" >
 	<?php 
 	    drawKillingField();
 	    //placeXM(0, 0, 80);
 	?> 
</div>

</div>
</div>
</div>
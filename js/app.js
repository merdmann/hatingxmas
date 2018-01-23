// Your custom application Javascript


console.log("Application code");
 

function rotate(name, deg) {
	var o = $(name);
	console.assert( o !== null, "move:" + name + " object not found");
	
	o.css("position", "absolute");
	o.css("transform", "rotate("+deg+"deg)");
	o.css("transform-origin", "bottom left" );
	o.css("border", "3px dotted green");
}

function translate(name, dx, dy) {
	var o = $(name);
	console.assert( o !== null, "translate:" + name + " object not found");

	o.css("position", "absolute" );
	o.css("transform", "translate(" + dx + "px, " + dy + "px)" );
	o.css("transform-origin", "buttom left");
}


function setupObj( name, clicker ) {
	var o = $(name);
	
	console.assert( o !== null, 'setupObj:' + name + ' not found!' );
	
	o.click( function clicker() { console.log("Hit"); } );	
}


// game context 
var deg = 0;
var x = 0;
var y = 0;

var dx = 5
var dy = 5;

setupObj("#xmas");

setTimeout( moveit, 500 );

function moveit() {
	setTimeout( moveit, 500 );
	deg = deg + 5;
	rotate("#xmas", deg);
	
	// when is am leaving the box reflect.
	if( ( y > 300) || (y < 0) ) {
		dx = -dx;
		dy = -dy;
	}
		
	translate("#xmas", x, y);
	x += dx;
	y += dy;
	
	$("#xpos").text( x );
	$("#ypos").text( y );
 
		
}


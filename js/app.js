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


function click_handler(arg) {
	console.log("clicked " + arg );
}

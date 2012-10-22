window.globals = {};	//Necessary for accessing Paper components via JavaScript

// Fog
var count = 6;
var spin = 1;
globals.placedSymbol = new Array();
fog = new Raster('fog');
fog.opacity = 0.5;
symbol = new Symbol(fog);

// Place fog on the map
for(var i = 0; i < count; i++)
{
	var center = Point.random()*view.size;
	globals.placedSymbol[i] = symbol.place(center);
	globals.placedSymbol[i].scale(5 * (i/count));
}

function onFrame(event)	// Animating the fog
{
	fog.rotate(spin);
}

globals.clear_fog = function()
{
	for(var j = 0; j < count; j++)
	{
		globals.placedSymbol[j].remove();	//Hallelujah!!!
	}
}
globals.addBattlefield = function(terrain)
{
	var field = new Raster(terrain);
	field.position = view.center - 10;
}
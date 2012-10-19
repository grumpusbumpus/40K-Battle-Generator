// Painting fog onto the canvas
var count = 6;
var fog = new Raster('fog');
var symbol = new Symbol(fog);

// Place fog on the map
for(var i = 0; i < count; i++)
{
	var center = Point.random()*view.size;
	var placedSymbol = symbol.place(center);
	placedSymbol.scale(5 * (i/count));
}

function onFrame(event)	// Animating the fog
{
	fog.rotate(1);
}

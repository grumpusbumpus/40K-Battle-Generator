// Painting fog onto the canvas
var fog = new Raster('fog');
fog.scale(5);
// Placing fog at the center of the canvas
fog.position = view.center;
function onFrame(event)	// Animating the fog
{
	fog.rotate(1);
}

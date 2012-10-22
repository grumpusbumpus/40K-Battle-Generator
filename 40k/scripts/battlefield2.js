// Painting fog onto the canvas

function foggy(fog)
{
	fog = new Raster('fog');

	//place fog
	fog.position = new Point(100,100);
	paper.view.onFrame = function(event)	// Animating the fog
	{
		fog.rotate(1);
	}
}
function clear_fog(fog)
{
	paper.project = "";
}
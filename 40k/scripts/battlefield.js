globals.addForts = false;	// Whether or not forts can be added to battlefield
globals.fortClicks = 0;
globals.forts = new Array();	// Information about battlefield fortifications
globals.terrain = new Array;



// Fog
var count = 6;
var spin = 1;
globals.placedSymbol = new Array();
fog = new Raster('fog');
fog.opacity = 0.2;
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
	field.position = view.center -10;
}

/*
 *
 *	Function to draw deployment zones
 *	TODO: DRAW THE DEPLOYMENT ZONES ABOVE THE REST OF THE MAP
 *
 */

globals.drawDeployment = function(faction_count, mission_type)
{
	var current_layer = project.activeLayer;
	var deployment_layer = new Layer();
	var opacity = 0.30;
	var color1 = new RgbColor(1,0,0);
	var color2 = new RgbColor(0,0,1);
	var color3 = new RgbColor(0,1,0); 
	var color4 = new RgbColor(255,255,0);
	var size1 = new Size(60,360);
	var size2 = new Size(240,120);
	
	//	Moving the deployment layer above the other drawing layer (I hope.  Yep, it works!)
	deployment_layer.activate();
	deployment_layer.moveAbove(current_layer);
		
	if(mission_type == 0)
	{		
		var zone1 = new Path.Circle(new Point(0,0), 60);
		zone1.fillColor = color1;
		zone1.strokeColor = color1;
		zone1.opacity = opacity;
		
		var zone2 = new Path.Circle(new Point(240, 240), 60);
		zone2.fillColor = color2;
		zone2.strokeColor = color2;
		zone2.opacity = opacity;
		
		if(faction_count == 4)
		{
			var zone3 = new Path.Circle(new Point(0,240), 60);
			zone3.fillColor = color3;
			zone3.strokeColor = color3;
			zone3.opacity = opacity;
			
			var zone4 = new Path.Circle(new Point(240,0), 60);
			zone4.fillColor = color4;
			zone4.strokeColor = color4;
			zone4.opacity = opacity;
			
			point1 = new Point(0,120);
			point2 = new Point(240,120);
			draw_center_line(point1,point2);
			
			point1 = new Point(120,0);
			point2 = new Point(120,240);
			draw_center_line(point1,point2);
			
		}
		else
		{
			point1 = new Point(240,0);
			point2 = new Point(0,240);
			draw_center_line(point1,point2);
		}
	}
	else if(mission_type == 1)
	{
		var roll = rollD3();
		switch(roll)
		{
			case 1:
				var zone1 = new Path.Rectangle(new Point(0,0),size1);
				zone1.fillColor = color1;
				zone1.strokeColor = color1;
				zone1.opacity = opacity;
				var zone2 = new Path.Rectangle(new Point(180, 0),size1);
				zone2.fillColor = color2;
				zone2.strokeColor = color2;
				zone2.opacity = opacity;
				point1 = new Point(120,0);
				point2 = new Point(120,360);
				draw_center_line(point1,point2);
				break;
			case 2:
				var zone1 = new Path.Rectangle(new Point(0,0),size2);
				zone1.fillColor = color1;
				zone1.strokeColor = color1;
				zone1.opacity = opacity;
				var zone2 = new Path.Rectangle(new Point(0,240),size2);
				zone2.fillColor = color2;
				zone2.strokeColor = color2;
				zone2.opacity = opacity;
				point1 = new Point(0,180);
				point2 = new Point(240,180);
				draw_center_line(point1,point2);
				break;
			case 3:
				var zone1 = new Path(new Point(0,0),new Point(170,0),new Point(0,255));
				zone1.closed = true;
				zone1.fillColor = color1;
				zone1.strokeColor = color1;
				zone1.opacity = opacity;
				
				var zone2 = new Path(new Point(70,360),new Point(240,105),new Point(240,360));
				zone2.closed = true;
				zone2.fillColor = color2;
				zone2.strokeColor = color2;
				zone2.opacity = opacity;
				
				point1 = new Point(240,0);
				point2 = new Point(0,360);
				draw_center_line(point1,point2);
				break;
		}
	}
	else
	{
		alert('special mission');
	}
	
	/*
	 *
	 *	Draw line(s) down the center of the battlefield
	 *
	 */
	
	function draw_center_line(point1,point2)
	{
		center_line = new Path.Line(point1,point2);
		center_line.strokeWidth = 4;
		center_line.strokeColor = 'white';
		center_line.dashArray = [10,4];
	}
	
	//	Return to the regular layer to draw other features
	current_layer.activate();
}

globals.clearCanvas = function()	//Works!!!
{
	project.activeLayer.remove();
	var layer = new Layer();
}

 /**
 *
 *	Draw Terrain on map
 *
 *	id = CSS id of image to draw
 *	x,y = coordinates to draw on canvas
 *	r = how many degrees to rotate image (negative value for random)
 *
 */
 
globals.draw_terrain = function(id, x, y, r)
{
	var rotation;
	var feature = globals.terrain.length;
	globals.terrain[feature] = new Raster(id);
	if(r<0)
	{
		rotation = Math.random()*360;
	}
	else
	{
		rotation = r;
	}
	globals.terrain[feature].position = new Point(x,y);
	globals.terrain[feature].rotate(rotation);
}


//	Handling mouse clicks on the canvas

function onMouseUp(event)
{
	if(globals.addForts == true)
	{
		//Track fort location
		var spot = new Point(event.point);
		
		/*****************************
		For calculating terrain density
		******************************/
		var density_x = Math.floor(spot.x/120);
		var density_y = Math.floor(spot.y/120);
		var density_index = density_x + (density_y * 2);
		globals.density[density_index] -= 1;
		
		/*****************************/
		
		
		/******************************
		For handling spaces occupied by terrain
		TODO: FIX THIS
		******************************/
		var terrain_x = Math.floor(spot.x/60);
		var terrain_y = Math.floor(spot.y/60);
		var terrain_index = terrain_x + (terrain_y * 4);
		globals.terrain_array[terrain_index] = "bastion";
		/*****************************/
		
		spot = spot/60;
		spot.x = Math.floor(spot.x);
		spot.y = Math.floor(spot.y);
		globals.fortClicks++;
		document.getElementById("fort_count").innerHTML = String(globals.fortClicks);
		
		//Draw Fort on map
		spot.x = spot.x + 0.5;
		spot.y = spot.y + 0.5;
		globals.forts[globals.fortClicks] = new Raster('bastion');
		globals.forts[globals.fortClicks].position = new Point(spot*60);
		var rotation = Math.random()*360;
		globals.forts[globals.fortClicks].rotate(rotation);
	}
}
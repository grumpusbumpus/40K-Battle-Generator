/**
 *
 *	TODO:	Establish Global Variables
 *
 */
 window.globals = {};	//Necessary for accessing Paper components via JavaScript
 globals.density = new Array();	//	Tracking terrain density on the battlefield
 globals.density[0] = new Array();
 globals.density[1] = new Array();
 globals.game_size;	//	How large the game is, to determine battlefield size
 var player_count;	//	The number of players in the game
 var faction_count;	//	How many sides are fighting in the battle (2 or 4);
 var objective_count; // How many objectives the scenario requires
 var mission_type;	// Small (0) Standard (1) or Special Mission (2)
 var mission_num;	// Which mission was selected
 var terrain_type;	// Which sort of battlefield is being fought on



/**
 *
 *	Testing
 *
 */ 

function test()
{
	console.log("(0,0): " + globals.density[0][0] + "(1,0): " + globals.density[1][0] + '\n'
	+ "(0,1): " + globals.density[0][1] + "(1,1): " + globals.density[1][1] + '\n'
	+ "(0,2): " + globals.density[0][2] + "(1,2): " + globals.density[1][2]);
}
 /**
 *
 *	Function to Initialize on page load
 *
 */ 
 
function init()
{
	add_tooltips();	// Add popup text across the page
	step1(); //	Start the battle generation process
}
 
/**
 *
 *	Step1: Ask for number of players
 *
 */
 
function step1()
{
	show("step1");
}
 
/**
 *
 *	Step2: Ask for number of factions
 *
 */
 
function step2(players)
{
	player_count = players;
	hide("step1");
	if(player_count == 4)
	{
		show("step2");
	}
	else
	{
		step3(2);
	}
	
}
 
 /**
 *
 *	Step3: Ask for game size
 *
 */
 
function step3(factions)
{
	faction_count = factions;
	hide("step2");
	show("step3");
	if(faction_count == 2)
	{
		var button = document.createElement('button');
		button.setAttribute('id','3button1');
		button.innerHTML='Less than 500 points';
		button.setAttribute('onclick','step4(0);');
		document.getElementById("step3").appendChild(button);
		
		button = document.createElement('button');
		button.setAttribute('id','3button2');
		button.innerHTML='500 points';
		button.setAttribute('onclick','step4(1);');
		document.getElementById("step3").appendChild(button);
		
		button = document.createElement('button');
		button.setAttribute('id','3button3');
		button.innerHTML='More than 500 points';
		button.setAttribute('onclick','step4(2);');
		document.getElementById("step3").appendChild(button);
	}
	else
	{
		var button = document.createElement('button');
		button.setAttribute('id','3button1');
		button.innerHTML='Less than 500 points';
		button.setAttribute('onclick','step4(0);');
		document.getElementById("step3").appendChild(button);
		
		button = document.createElement('button');
		button.setAttribute('id','3button2');
		button.innerHTML='500 points';
		button.setAttribute('onclick','step4(1);');
		document.getElementById("step3").appendChild(button);
	}
}
 
 /**
 *
 *	Step 4: Ask for Mission Type Preference
 *
 */

function step4(g_size)
{
	globals.game_size = g_size;
	hide("step3");
	show("step4");
	if(globals.game_size < 2)
	{
		shrink_battlefield();
		globals.density[0] = [0,0];
		globals.density[1] = [0,0];
	}
	else
	{
		globals.density[0] = [0,0,0];
		globals.density[1] = [0,0,0];
	}
	if(globals.game_size == 0)
	{
		show("suicide_mission");
		mission_num = 0;
		objective_count = 4;
		step5(0);
	}
	else if(globals.game_size == 1)
	{
		show("battleforce_recon");
		mission_num = 1;
		objective_count = 4;
		step5(0);
	}
}

 /**
 *
 *	TODO:	Step 5: Ask for Mission Preference
 *
 */
 
function step5(type)
{
	mission_type = type;
	hide("step4");
	switch(mission_type)
	{
		case 0:
			step6();
			break;
		case 1:
			show("step5a");
			break;
		case 2:
			show("step5b");
			break;
	}
}

 /**
 *
 *	TODO:	Step 6: Generate Random Mission and ask for Terrain Preference
 *
 */
 
function step6(number)
{
	hide("the_mission");
	hide("classified");
	if (number == 0)
	{
		number = rollD6();
	}
	switch(mission_type)
	{
		case 0:	// Small Mission
			break;
		case 1:	//Standard Mission
			hide("step5a");
			switch(number)
			{
				case 1:
					show('crusade');
					mission_num = 1;
					objective_count = rollD3() + 2;
					break;
				case 2:
					show('purge_the_alien');
					mission_num = 2;
					break;
				case 3:
					show('big_guns_never_tire');
					mission_num = 3;
					objective_count = rollD3() + 2;
					break;
				case 4:
					show('the_scouring');
					mission_num = 4;
					objective_count = 6;
					break;
				case 5:
					show('the_emperors_will');
					mission_num = 5;
					objective_count = 2;
					break;
				case 6:
					show('the_relic');
					mission_num = 6;
					break;
			}
			break;
		case 2:	// Special Mission
			hide("step5b");
			switch(number)
			{
				case 1:
					show('the_pact_of_blood');
					mission_num = 1;
					break;
				case 2:
					break;
				case 3:
					break;
				case 4:
					break;
				case 5:
					break;
				case 6:
					break;
			}
	}
	show("step6");	// Show terrain question
	
}

 /**
 *
 *	TODO:	Step 7: Generate Terrain and Deployment Zones
 *
 */
 
function step7(terrain)
{
	hide("step6")
	if(terrain=="random")
	{
		switch(rollD6())
		{
			case 1:
				terrain_type = "arctic";
				break;
			case 2:
				terrain_type = "plain";
				break;
			case 3:
				terrain_type = "urban";
				break;
			case 4:
				terrain_type = "overgrown";
				break;
			case 5:
				terrain_type = "rugged";
				break;
			case 6:
				terrain_type = "volcanic";
				break;
		}
	}
	else
	{
		terrain_type = terrain;
	}
	globals.clear_fog();
	globals.addBattlefield(terrain_type);
	globals.drawDeployment(faction_count, mission_type);
	show("step7");
	globals.addForts = true;	// Allow player to click on map
}

 /**
 *
 *	TODO:	Step8
 *
 */
 
 function step8()
 {
	globals.addForts = false;	//Keeps players from adding more forts
	hide("step7");
	show("step8");
	
	//Generate Terrain Density
	for(var i = 0; i < 2; i++)
	{
		if(globals.game_size < 2)
		{
			var height = 2;
		}
		else
		{
			var height = 3;
		}
		for (var j = 0; j < height; j++)
		{
			globals.density[i][j] += rollD3();
		}
	}
	
	//Draw Density Markers
	for(var i = 0; i < 2; i++)
	{
		if(globals.game_size < 2)
		{
			var height = 2;
		}
		else
		{
			var height = 3;
		}
		for (var j = 0; j < height; j++)
		{
			var number = globals.density[i][j];
			var x = (i*120)+60;
			var y = (j*120)+60;
			switch(number)
			{
				case 1:
					globals.draw_terrain('density_1',x,y);
					break;
				case 2:
					globals.draw_terrain('density_2',x,y);
					break;
				case 3:
					globals.draw_terrain('density_3',x,y);
					break;
				default:
					break;
			}
		}
	}
 }

 /**
 *
 *	Shrink Battlefield
 *
 */

function shrink_battlefield()
{
	document.getElementById("battlefield").setAttribute("height","240");
	document.getElementById("battlefield").setAttribute("style","margin-top: 25%;");
}

 /**
 *
 *	Clear Forts
 *
 */

function clear_forts()
{
	for(var i = 1; i < (globals.fortClicks+1); i++)
	{
		globals.clearFort(i);
	}
	globals.fortClicks = 0;
	globals.forts = new Array();
	document.getElementById("fort_count").innerHTML = "0";
}
 
 /**
 *
 *	TODO:	Step9
 *
 */
 
 /**
 *
 *	TODO:	Step10
 *
 */

/**
 *
 *	TODO:	Function to add tooltip to a piece of text
 *
 */
 
function add_tooltips()
{
	var tips = document.getElementsByTagName("span");
	for(var term, tip, i = 0; i < tips.length; i++)
	{
		term = tips.item(i);
		tip = term.getAttribute("tip");
		if(tip != "")
		{
			term.setAttribute("onmouseover","tooltip.show('"+tip+"');");
			term.setAttribute("onmouseout","tooltip.hide();");
			term.setAttribute("class","tip");
		}
	}
}
 
 /**
 *
 *	TODO:	Function to generate terrain densities
 *
 */
 
/**
 *
 *	TODO:	Function to assign terrain features
 *
 */ 

/**
 *
 *	TODO:	Function to generate deployment zones
 *
 */ 
 
/**
 *
 *	TODO:	Function to reset opacities on mouseover/click for each column
 *
 */ 
 
/**
 *
 *	Function to display hidden elements
 *
 */ 
 
function show(el_id)
{
	document.getElementById(el_id).style.display='inline';
}
 
 /**
 *
 *	Function to hide displayed elements
 *
 */ 
 
function hide(el_id)
{
	document.getElementById(el_id).style.display='none';
}
 
 
/**
 *
 *	Function to roll D6s
 *
 */
 
function rollD6(number)
{
	var total = 0;
	if(!number)
	{
		number = 1;
	}
	for (var i = 0; i < number; i++)
	{
		total = (total + Math.floor(Math.random()*6)+1);
	}
	return total;
}

/**
 *
 *	Function to roll D3s
 *
 */
 
function rollD3(number)
{
	var total = 0;
	if(!number)
	{
		number = 1;
	}
	for (var i = 0; i < number; i++)
	{
		total = (total + Math.floor(Math.random()*3)+1);
	}
	return total;
}

/**
*
* Tool tip function.  Add the stuff below to any text to get tooltip popups.
* The second argument is optional.
* onmouseover="tooltip.show('Testing  123 ', 200);"
* onmouseout="tooltip.hide();"
*/

var tooltip=function(){
	var id = 'tt';
	var top = 3;
	var left = -100;	// Originally 3
	var maxw = 200;	// Originally 300
	var speed = 30;
	var timer = 10;
	var endalpha = 95;
	var alpha = 0;
	var tt,t,c,b,h;
	var ie = document.all ? true : false;
	return{
		show:function(v,w){
			if(tt == null){
				tt = document.createElement('div');
				tt.setAttribute('id',id);
				t = document.createElement('div');
				t.setAttribute('id',id + 'top');
				c = document.createElement('div');
				c.setAttribute('id',id + 'cont');
				b = document.createElement('div');
				b.setAttribute('id',id + 'bot');
				tt.appendChild(t);
				tt.appendChild(c);
				tt.appendChild(b);
				document.body.appendChild(tt);
				tt.style.opacity = 0;
				tt.style.filter = 'alpha(opacity=0)';
				document.onmousemove = this.pos;
			}
			tt.style.display = 'block';
			c.innerHTML = v;
			tt.style.width = w ? w + 'px' : 'auto';
			if(!w && ie){
				t.style.display = 'none';
				b.style.display = 'none';
				tt.style.width = tt.offsetWidth;
				t.style.display = 'block';
				b.style.display = 'block';
			}
			if(tt.offsetWidth > maxw){tt.style.width = maxw + 'px'}
			h = parseInt(tt.offsetHeight) + top;
			clearInterval(tt.timer);
			tt.timer = setInterval(function(){tooltip.fade(1)},timer);
		},
		pos:function(e){
			var u = ie ? event.clientY + document.documentElement.scrollTop : e.pageY;
			var l = ie ? event.clientX + document.documentElement.scrollLeft : e.pageX;
			tt.style.top = (u - h) + 'px';
			tt.style.left = (l + left) + 'px';
		},
		fade:function(d){
			var a = alpha;
			if((a != endalpha && d == 1) || (a != 0 && d == -1)){
				var i = speed;
				if(endalpha - a < speed && d == 1){
					i = endalpha - a;
				}else if(alpha < speed && d == -1){
					i = a;
				}
				alpha = a + (i * d);
				tt.style.opacity = alpha * .01;
				tt.style.filter = 'alpha(opacity=' + alpha + ')';
			}else{
				clearInterval(tt.timer);
				if(d == -1){tt.style.display = 'none'}
			}
		},
		hide:function(){
			clearInterval(tt.timer);
			tt.timer = setInterval(function(){tooltip.fade(-1)},timer);
		}
	};
}();

/**
*
*	Sound Playing function
*
*/
function playSound(file)
{
	var snd = new Audio(file); // buffers automatically when created
	snd.play();
}
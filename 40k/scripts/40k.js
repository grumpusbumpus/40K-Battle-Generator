/**
 *
 *	TODO:	Establish Global Variables
 *
 */
 
 var player_count;	//	The number of players in the game
 var faction_count;	//	How many sides are fighting in the battle (2 or 4);
 var game_size;	//	How large the game is, to determine battlefield size

/**
 *
 *	Function to Initialize on page load
 *
 */ 

function init()
{
	add_tooltips();
	step1();
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
 *	TODO:	Step 4: Ask for Mission Preference
 *
 */

function step4(g_size)
{
	game_size = g_size;
	hide("step3");
	show("step4");
	if(game_size < 2)
	{
		shrink_battlefield();
		hide("the_mission");
		hide("classified");
	}
	if(game_size == 0)
	{
		show("suicide_mission");
		step5();
	}
	else if(game_size == 1)
	{
		show("battleforce_recon");
		step5();
	}
}

 /**
 *
 *	TODO:	Step 5: Generate Random Mission
 *
 */
 
function step5(mission_type)
{
	hide("the_mission");
	hide("classified");
	hide("step4");
	show("step5");
	if(game_size = 2)
	{
		if(mission_type == 0) // Standard Mission
		{
			var roll = rollD6();
			switch(roll)
			{
				case 1:
					show('crusade');
					break;
				case 2:
					show('purge_the_alien');
					break;
				case 3:
					show('big_guns_never_tire');
					break;
				case 4:
					show('the_scouring');
					break;
				case 5:
					show('the_emperors_will');
					break;
				case 6:
					show('the_relic');
					break;
			}
		}
		else // Special Mission
		{
			
		}
	}
	step6();
}

 /**
 *
 *	TODO:	Step 6: Profit?
 *
 */
 
function step6()
{
	
}

 /**
 *
 *	TODO:	Shrink Battlefield
 *
 */

function shrink_battlefield()
{
	document.getElementById("battlefield").setAttribute("height","240");
	document.getElementById("battlefield").setAttribute("style","margin-top: 25%;");
}
 
 /**
 *
 *	TODO:	Step5
 *
 */
 
 /**
 *
 *	TODO:	Step6
 *
 */
 
 /**
 *
 *	TODO:	Step7
 *
 */
 
 /**
 *
 *	TODO:	Step8
 *
 */
 
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
	var left = 3;
	var maxw = 300;
	var speed = 10;
	var timer = 20;
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
/**
 *
 *	TODO:	Establish Global Variables
 *
 */
 
 var player_count = 0;	//	The number of players in the game
 var game_size = "";	//	How large the game is, to determine battlefield size
 var mission_typ = "";	//	Standard vs. Special Missions

/**
 *
 *	TODO:	Function to Initialize on page load
 *
 */ 

function init()
{
	add_tooltips();
}
 
/**
 *
 *	TODO:	Function to generate terrain features
 *
 */
 
 /**
 *
 *	TODO:	Function to generate battlefield map
 *
 */

/**
 *
 *	TODO:	Function to generate objectives
 *
 */

/**
 *
 *	TODO:	Function to generate mission
 *
 */
 
 function gen_mission()
 {
	if(game_size=='small')
	{
		
	}
	else
	{
		
	}
 }

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
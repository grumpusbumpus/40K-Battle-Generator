<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/styles.css" />
<link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
<script src="scripts/40k.js" type="text/javascript"></script>
</head>
<body>

<div id="background">
	<img src="images/background.jpg" class="stretch" alt="background"/>
</div>

<div id="topbar">
	<p><a href="/">Return to the Campaign Screen</a> *Coming Soon*</p>
</div>
<div id="pagewrap">

	<div id="header">
		<h1>Warhammer 40,000 Battle Generator</h1>
	</div>

	<div id="content">
		<h2>Order of Battle</h2>
		<div>
			<p><button onclick="document.getElementById('d6').innerHTML=rollD6();">Roll a D6!</button>
			<span id="d6" class="dice"> &nbsp </span></p>
			<p><button onclick="document.getElementById('d3').innerHTML=rollD3();">Roll a D3!</button>
			<span id="d3" class="dice"> &nbsp </span></p>
			<div>
				Here I am writing stuff to see how this works.  I am going to test how the <span class="hotspot" onmouseover="tooltip.show('A tooltip is a popup window that shows additonal information.');" onmouseout="tooltip.hide();">tooltip</span> functionality works.
			</div>
		</div>
		<div>
			<h3>Number of Players</h3>
		</div>
		<div>
			<h3>Build Armies</h3>
		</div>
		<div>
			<h3>Generate Mission</h3>
		</div>
		<div>
			<h3>Generate Deployment Style</h3>
		</div>
		<div>
			<h3>Deploy Fortifications</h3>
		</div>
		<div>
			<h3>Deploy Terrain</h3>
		</div>
		<div>
			<h3>Place Objectives</h3>
		</div>
		<div>
			<h3>Determine Warlord Traits</h3>
		</div>
		<div>
			<h3>Deploy Forces</h3>
		</div>
		<div>
			<h3>Seize the Initiative</h3>
		</div>
		<div>
			<h3>Play</h3>
		</div>
	</div>
	
	<div id="middle">
		<h2>The Battlefield</h2>
		<div id="battlefield">
			<img class="centered" src="images/battlefield.jpg"/>
		</div>
	</div>

	<div id="sidebar">
		<h2>The Mission</h2>
		<div>
			<h3>Special Rules</h3>
		</div>
		<div>
			<h3>Primary Objectives</h3>
		</div>
		<div>
			<h3>Secondary Objectives</h3>
		</div>
		<div>
			<h3>Game Length</h3>
		</div>
	</div>
	
	<div id="footer">
		<h4>Footer</h4>
		<p>Here is the footer!</p>
	</div>
	
</div>
</body>
</html>
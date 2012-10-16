<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/styles.css" />
<script src="scripts/40k.js" type="text/javascript"></script>
</head>
<body>

<div id="background">
	<img src="images/background.jpg" class="stretch" alt="background"/>
</div>

<div id="topbar">
	<p><a href="/">Return to the Campaign Screen</a></p>
</div>
<div id="pagewrap">

	<div id="header">
		<h1>Warhammer 40,000 Battle Generator</h1>
	</div>

<div id="content">
		<h2>Fighting the Battle</h2>
		<p><button onclick="document.getElementById('d6').innerHTML=rollD6();">Roll a D6!</button>
		<span id="d6" class="dice"> &nbsp </span></p>
		<p><button onclick="document.getElementById('d3').innerHTML=rollD3();">Roll a D3!</button>
		<span id="d3" class="dice"> &nbsp </span></p>
		<div>Here I am writing stuff to see how this works.  I am going to test how the <span class="hotspot" onmouseover="tooltip.show('A tooltip is a popup window that shows additonal information.');" onmouseout="tooltip.hide();">tooltip</span> functionality works.</div>
	</div>
	
	<div id="middle">
		<h2>The Battlefield</h2>
		<img class="centered" src="images/battlefield.jpg"/>
	</div>

	<div id="sidebar">
		<h2>The Mission</h2>
		
	</div>
	
	<div id="footer">
		<h4>Footer</h4>
		<p>Here is the footer!</p>
	</div>
	
</div>
</body>
</html>
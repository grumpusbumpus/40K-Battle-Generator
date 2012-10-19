<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/styles.css" />
<link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
<script src="scripts/40k.js" type="text/javascript"></script>
<script src="scripts/paper.js" type="text/javascript"></script>
<script src="scripts/battlefield.js" type="text/paperscript" canvas="battlefield"></script>
</head>
<body onload="init();">

<div id="topbar">
	<p><a href="/">Return to the Campaign Screen</a> *Coming Soon*</p>
</div>
<div id="pagewrap">

	<div id="header">
		<h1>Warhammer 40,000 Battle Generator</h1>
	</div>

	<div id="content">
		<h2>Order of Battle</h2>
		<div id="step1">
			<h3>Number of Players</h3>
			<p>How many players are playing?</p>
			<button onclick="show('step2');hide('step1');player_count=2;">2</button>
			<button onclick="show('step2');hide('step1');player_count=3;">3</button>
			<button onclick="show('step2');hide('step1');player_count=4;">4</button>
		</div>
		<div id="step2" class="hidden">
			<h3>Build Armies</h3>
			<p>Each <span tip="Two or more players fighting on the same side are considered a faction.">faction's</span> army is built with how many points?</p>
			<button onclick="game_size='small';hide('step2');show('step3');">500 Points or Less</button>
			<button onclick="game_size='large';hide('step2');show('step3');">More than 500 Points</button>
		</div>
		<div id="step3" class="hidden">
			<h3>Generate Mission</h3>
			<p>Are you playing a standard or special mission?</p>
			<button onclick="gen_mission('standard')">Standard Mission</button>
			<button onclick="gen_mission('special')">Special Mission</button>
		</div>
		<div id="step4" class="hidden">
			<h3>Generate Deployment Style</h3>
		</div>
		<div id="step5" class="hidden">
			<h3>Deploy Fortifications</h3>
		</div>
		<div id="step6" class="hidden">
			<h3>Deploy Terrain</h3>
		</div>
		<div id="step7" class="hidden">
			<h3>Place Objectives</h3>
		</div>
		<div id="step8" class="hidden">
			<h3>Determine Warlord Traits</h3>
		</div>
		<div id="step9" class="hidden">
			<h3>Deploy Forces</h3>
		</div>
		<div id="step10" class="hidden">
			<h3>Seize the Initiative</h3>
		</div>
	</div>
	
	<div id="middle">
		<h2>The Battlefield</h2>
		<div class="centered">
			<canvas id="battlefield" class="centered" width="240px" height="360px"></canvas>
			<img src="images/fog.png" id="fog" class="hidden"/>
		</div>
	</div>

	<div id="sidebar">
		<h2>The Mission</h2>
		<div>
			<h3>Special Rules</h3>
			<div id="special">
			</div>
		</div>
		<div>
			<h3>Primary Objectives</h3>
			<div id="primary">
			</div>
		</div>
		<div>
			<h3>Secondary Objectives</h3>
			<div id="secondary">
			</div>
		</div>
		<div>
			<h3>Game Length</h3>
			<div id="length">
			</div>
		</div>
	</div>
	
	<div id="footer">
		<h4>Footer</h4>
		<p>Here is the footer!</p>
	</div>
	
</div>
</body>
</html>
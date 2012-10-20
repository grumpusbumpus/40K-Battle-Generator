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
		<div id="step1" class="hidden">
			<h3>Number of Players</h3>
			<p>How many players are playing?</p>
			<button onclick="step2(2);">2</button>
			<button onclick="step2(3);">3</button>
			<button onclick="step2(4);">4</button>
		</div>
		<div id="step2" class="hidden">
			<h3>Number of Factions</h3>
			<p>How many <span tip="Two or more players fighting on the same side are considered a faction.">factions</span> are fighting?</p>
			<button onclick="step3(2);">2</button>
			<button onclick="step3(4);">4</button>
		</div>
		<div id="step3" class="hidden">
			<h3>Build Armies</h3>
			<p>Each <span tip="Two or more players fighting on the same side are considered a faction.">faction's</span> army is built with how many points?</p>
		</div>
		<div id="step4" class="hidden">
			<h3>Generate Mission</h3>
			<p>Are you playing a standard or special mission?</p>
			<button onclick="step5(0);">Standard Mission</button>
			<button onclick="step5(1);">Special Mission</button>
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
			<canvas id="battlefield" class="centered" width="240px" height="360px"></canvas>
			<img src="images/fog.png" id="fog" class="hidden"/>
	</div>

	<div id="sidebar">
		<h2 id="the_mission">The Mission</h2>
		<img id="classified" src="images/classified.png" width="200" alt="classified" class="centered"/>
		
		<!-- Small Missions -->
		
		<div id="suicide_mission" class="hidden">
			<h2>Suicide Mission</h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
			<h3>Game Length</h3>
		</div>
		<div id="battleforce_recon" class="hidden">
			<h2>Battleforce Recon</h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
			<h3>Game Length</h3>
		</div>
		
		<!-- Standard Missions -->
		
		<div id="crusade" class="hidden">
			<h2>Crusade</h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
			<h3>Game Length</h3>
		</div>
		<div id="purge_the_alien" class="hidden">
			<h2>Purge the Alien</h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
			<h3>Game Length</h3>
		</div>
		<div id="big_guns_never_tire" class="hidden">
			<h2>Big Guns Never Tire</h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
			<h3>Game Length</h3>
		</div>
		<div id="the_scouring" class="hidden">
			<h2>The Scouring</h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
			<h3>Game Length</h3>
		</div>
		<div id="the_emperors_will" class="hidden">
			<h2>The Emperor's Will</h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
			<h3>Game Length</h3>
		</div>
		<div id="the_relic" class="hidden">
			<h2>The Relic</h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
			<h3>Game Length</h3>
		</div>
		
		<!-- Special Missions -->
		
		<div id="" class="hidden">
			<h2></h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
			<h3>Game Length</h3>
		</div>
		<div id="" class="hidden">
			<h2></h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
			<h3>Game Length</h3>
		</div>
		<div id="" class="hidden">
			<h2></h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
			<h3>Game Length</h3>
		</div>
		<div id="" class="hidden">
			<h2></h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
			<h3>Game Length</h3>
		</div>
		<div id="" class="hidden">
			<h2></h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
			<h3>Game Length</h3>
		</div>
		<div id="" class="hidden">
			<h2></h2>
			<h3>Special Rules</h3>
			<h3>Primary Objectives</h3>
			<h3>Secondary Objectives</h3>
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
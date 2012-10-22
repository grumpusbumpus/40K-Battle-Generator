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
			<button onclick="step5(1);">Standard Mission</button>
			<button onclick="step5(2);">Special Mission</button>
		</div>
		<div id="step5a" class="hidden">
			<h3>Standard Missions</h3>
			<button onclick="step6(1)">Crusade</button>
			<button onclick="step6(2)">Purge the Alien</button>
			<button onclick="step6(3)">Big Guns Never Tire</button>
			<button onclick="step6(4)">The Scouring</button>
			<button onclick="step6(5)">The Emperor's Will</button>
			<button onclick="step6(6)">The Relic</button>
			<button onclick="step6(0)">Random</button>
		</div>
		<div id="step5b" class="hidden">
			<h3>Special Missions</h3>
			<button onclick="step6(1)">The Pact of Blood</button>
		</div>
		<div id="step6" class="hidden">
			<h3>Battlefield Terrain</h3>
			<p>In what terrain is the battle being fought?</p>
			<button onclick="step7('arctic')">Arctic</button>
			<button onclick="step7('plain')">Plain</button>
			<button onclick="step7('urban')">Urban</button>
			<button onclick="step7('overgrown')">Overgrown</button>
			<button onclick="step7('rugged')">Rugged</button>
			<button onclick="step7('volcanic')">Volcanic</button>
			<button onclick="step7('random')">Random</button>
		</div>
		<div id="step7" class="hidden">
			<h3>Determine Deployment Zones</h3>
			<p>Roll off to determine which player may choose his deployment zone.</p>
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
			<div id="battlefield_resources" class="hidden">
				<img src="images/fog.png" id="fog"/>
				<img src="images/arctic.jpg" id="arctic"/>
				<img src="images/plain.jpg" id="plain"/>
				<img src="images/urban.jpg" id="urban"/>
				<img src="images/overgrown.jpg" id="overgrown"/>
				<img src="images/rugged.jpg" id="rugged"/>
				<img src="images/volcanic.jpg" id="volcanic"/>
			</div>
	</div>

	<div id="sidebar">
		<h2 id="the_mission">The Mission</h2>
		<img id="classified" src="images/classified.png" width="200" alt="classified" class="centered"/>
		
		<!-- Small Missions -->
		
		<div id="suicide_mission" class="hidden">
			<h2>Suicide Mission</h2>
			<h3>Victory Conditions</h3>
			<p>At the end of the game, the player who has scored the most Victory Points wins the game. If players have the same number of Victory Points, the game is a draw.</p>
			<h3>Primary Objectives</h3>
			<p>At the end of the game, each Primary Objective is worth 2 Victory Points to the player that <span tip="You control an objective if there is at least one model from one of your scoring units, and no models from enemy denial units, within 3 inches of it.">controls</span> it.</p>
			<h3>Secondary Objectives</h3>
			<p><span tip="If, at the end of the game, the enemy\'s Warlord has been slain, you score 1 Victory Point.">Slay the Warlord</span>, <span tip="The first unit, of any kind, to be removed as a casualty during the game is worth 1 Victory Point to the opposing player at the end of the game.">First Blood</span>, <span tip="If, at the end of the game, you have at least one model from one or more scoring or denial units in the enemy\'s deployment zone,you score 1 victory Point.">Linebreaker</span></p>
			<h3>Game Length</h3>
			<p>6 Turns</p>
			<h3>Special Rules</h3>
			<p><span tip="When deploying their armies, players can choose not to deploy up to half of their units, rounding up, keeping them as reserves to arrive later. Units which must start in reserve are ignored. At the start of your turn 2, you must roll a D6 for each unit in reserve. It arrives on a 3 or more. Arriving rseserves move before other units.">Reserves</span>, <span tip="Every model counts as an Independent Character. Ignore Unit Coherency and Break Tests for 25% casualties.  Every model counts as a scoring unit.">Suicide Squad</span></p>
		</div>
		<div id="battleforce_recon" class="hidden">
			<h2>Battleforce Recon</h2>
			<h3>Victory Conditions</h3>
			<p>At the end of the game, the player who has scored the most Victory Points wins the game. If players have the same number of Victory Points, the game is a draw.</p>
			<h3>Primary Objectives</h3>
			<p>At the end of the game, each Primary Objective is worth 2 Victory Points to the player that <span tip="You control an objective if there is at least one model from one of your scoring units, and no models from enemy denial units, within 3 inches of it.">controls</span> it.</p>
			<h3>Secondary Objectives</h3>
			<p><span tip="If, at the end of the game, the enemy\'s Warlord has been slain, you score 1 Victory Point.">Slay the Warlord</span>, <span tip="The first unit, of any kind, to be removed as a casualty during the game is worth 1 Victory Point to the opposing player at the end of the game.">First Blood</span>, <span tip="If, at the end of the game, you have at least one model from one or more scoring or denial units in the enemy\'s deployment zone,you score 1 victory Point.">Linebreaker</span></p>
			<h3>Game Length</h3>
			<p>6 Turns</p>
			<h3>Special Rules</h3>
			<p><span tip="When deploying their armies, players can choose not to deploy up to half of their units, rounding up, keeping them as reserves to arrive later. Units which must start in reserve are ignored. At the start of your turn 2, you must roll a D6 for each unit in reserve. It arrives on a 3 or more. Arriving rseserves move before other units.">Reserves</span></p>
		</div>
		
		<!-- Standard Missions -->
		
		<div id="crusade" class="hidden">
			<h2>Crusade</h2>
			<h3>Victory Conditions</h3>
			<p>At the end of the game, the player who has scored the most Victory Points wins the game. If players have the same number of Victory Points, the game is a draw.</p>
			<h3>Primary Objectives</h3>
			<p>At the end of the game, each Primary Objective is worth 3 Victory Points to the player that <span tip="You control an objective if there is at least one model from one of your scoring units, and no models from enemy denial units, within 3 inches of it.">controls</span> it.</p>
			<h3>Secondary Objectives</h3>
			<p><span tip="If, at the end of the game, the enemy\'s Warlord has been slain, you score 1 Victory Point.">Slay the Warlord</span>, <span tip="The first unit, of any kind, to be removed as a casualty during the game is worth 1 Victory Point to the opposing player at the end of the game.">First Blood</span>, <span tip="If, at the end of the game, you have at least one model from one or more scoring or denial units in the enemy\'s deployment zone,you score 1 victory Point.">Linebreaker</span></p>
			<h3>Game Length</h3>
			<p><span tip="At the end of game turn 5, one of the players must roll a D6. On a roll of 3+ the game continues, otherwise the game is over. If another turn is played, another D6 must be rolled at the end of game turn 6, and this time, the game only continues on a roll of 4 or more. The battle automatically ends at the close of game turn 7.">Variable</span></p>
			<h3>Special Rules</h3>
			<p><span tip="Roll a D6 before deployment: on a roll of 4+,the Night Fighting special rule is in effect during game turn l. If the Night Fighting rules did not take effect during game turn l, roll a D6 at the start of Game Turn 5, On a roll of 4+,the Night Fighting rules are used for the rest of the game. On a roll of 3 or less, you must roll again at the start of every subsequent game turn - as soon as a ro11 of 4+ is rolled, the Night Fighting rules come into play for the rest of the game.">Night Fighting</span>, <span tip="Any unit that moves within 3 inches of an objective, or is within 3 inches at the start of the first turn, must identify the nature of it. While any unit can identify the narure of an objective, only scoring units can make use of it. If there is more than one scoring unit within range of an objective, the unit with the closest model is considered to be in control. If two or more units are an equal distance frorn the objective, randomize which is in control.">Mysterious Objectives</span>, <span tip="When deploying their armies, players can choose not to deploy up to half of their units, rounding up, keeping them as reserves to arrive later. Units which must start in reserve are ignored. At the start of your turn 2, you must roll a D6 for each unit in reserve. It arrives on a 3 or more. Arriving rseserves move before other units.">Reserves</span></p>
		</div>
		<div id="purge_the_alien" class="hidden">
			<h2>Purge the Alien</h2>
			<h3>Victory Conditions</h3>
			<p>At the end of the game, the player who has scored the most Victory Points wins the game. If players have the same number of Victory Points, the game is a draw.</p>
			<h3>Primary Objectives</h3>
			<p>At the end of the game, each player receives 1 Victory Point for each enemy unit that has been completely destroyed.</p>
			<h3>Secondary Objectives</h3>
			<p><span tip="If, at the end of the game, the enemy\'s Warlord has been slain, you score 1 Victory Point.">Slay the Warlord</span>, <span tip="The first unit, of any kind, to be removed as a casualty during the game is worth 1 Victory Point to the opposing player at the end of the game.">First Blood</span>, <span tip="If, at the end of the game, you have at least one model from one or more scoring or denial units in the enemy\'s deployment zone,you score 1 victory Point.">Linebreaker</span></p>
			<h3>Game Length</h3>
			<p><span tip="At the end of game turn 5, one of the players must roll a D6. On a roll of 3+ the game continues, otherwise the game is over. If another turn is played, another D6 must be rolled at the end of game turn 6, and this time, the game only continues on a roll of 4 or more. The battle automatically ends at the close of game turn 7.">Variable</span></p>
			<h3>Special Rules</h3>
			<p><span tip="Roll a D6 before deployment: on a roll of 4+,the Night Fighting special rule is in effect during game turn l. If the Night Fighting rules did not take effect during game turn l, roll a D6 at the start of Game Turn 5, On a roll of 4+,the Night Fighting rules are used for the rest of the game. On a roll of 3 or less, you must roll again at the start of every subsequent game turn - as soon as a ro11 of 4+ is rolled, the Night Fighting rules come into play for the rest of the game.">Night Fighting</span>, <span tip="When deploying their armies, players can choose not to deploy up to half of their units, rounding up, keeping them as reserves to arrive later. Units which must start in reserve are ignored. At the start of your turn 2, you must roll a D6 for each unit in reserve. It arrives on a 3 or more. Arriving rseserves move before other units.">Reserves</span></p>
		</div>
		<div id="big_guns_never_tire" class="hidden">
			<h2>Big Guns Never Tire</h2>
			<h3>Victory Conditions</h3>
			<p>At the end of the game, the player who has scored the most Victory Points wins the game. If players have the same number of Victory Points, the game is a draw.</p>
			<h3>Primary Objectives</h3>
			<p>At the end of the game, each Primary Objective is worth 3 Victory Points to the player that <span tip="You control an objective if there is at least one model from one of your scoring units, and no models from enemy denial units, within 3 inches of it.">controls</span> it. Each player receives 1 Victory Point for each enemy heavy support unit that has been completely destroyed.</p>
			<h3>Secondary Objectives</h3>
			<p><span tip="If, at the end of the game, the enemy\'s Warlord has been slain, you score 1 Victory Point.">Slay the Warlord</span>, <span tip="The first unit, of any kind, to be removed as a casualty during the game is worth 1 Victory Point to the opposing player at the end of the game.">First Blood</span>, <span tip="If, at the end of the game, you have at least one model from one or more scoring or denial units in the enemy\'s deployment zone,you score 1 victory Point.">Linebreaker</span></p>
			<h3>Game Length</h3>
			<p><span tip="At the end of game turn 5, one of the players must roll a D6. On a roll of 3+ the game continues, otherwise the game is over. If another turn is played, another D6 must be rolled at the end of game turn 6, and this time, the game only continues on a roll of 4 or more. The battle automatically ends at the close of game turn 7.">Variable</span></p>
			<h3>Special Rules</h3>
			<p><span tip="Roll a D6 before deployment: on a ro11 of 4+,the Night Fighting special rule is in effect during game turn l. If the Night Fighting rules did not take effect during game turn l, roll a D6 at the start of Game Turn 5, On a roll of 4+,the Night Fighting rules are used for the rest of the game. On a roll of 3 or less, you must roll again at the start of every subsequent game turn - as soon as a ro11 of 4+ is rolled, the Night Fighting rules come into play for the rest of the game.">Night Fighting</span>, <span tip="Any unit that moves within 3 inches of an objective, or is within 3 inches at the start of the first turn, must identify the nature of it. While any unit can identify the narure of an objective, only scoring units can make use of it. If there is more than one scoring unit within range of an objective, the unit with the closest model is considered to be in control. If two or more units are an equal distance frorn the objective, randomize which is in control.">Mysterious Objectives</span>, <span tip="When deploying their armies, players can choose not to deploy up to half of their units, rounding up, keeping them as reserves to arrive later. Units which must start in reserve are ignored. At the start of your turn 2, you must roll a D6 for each unit in reserve. It arrives on a 3 or more. Arriving rseserves move before other units.">Reserves</span>, <span tip="Heavy support units count as scoring, including mobile vehicles.">Heavy Metal</span></p>
		</div>
		<div id="the_scouring" class="hidden">
			<h2>The Scouring</h2>
			<h3>Victory Conditions</h3>
			<p>At the end of the game, the player who has scored the most Victory Points wins the game. If players have the same number of Victory Points, the game is a draw.</p>
			<h3>Primary Objectives</h3>
			<p>At the end of the game, each Primary Objective is worth a number of Victory Points to the player that <span tip="You control an objective if there is at least one model from one of your scoring units, and no models from enemy denial units, within 3 inches of it.">controls</span> it equal to the value of the objective. Each player receives 1 Victory Point for each enemy fast attack unit that has been completely destroyed. </p>
			<h3>Secondary Objectives</h3>
			<p><span tip="If, at the end of the game, the enemy\'s Warlord has been slain, you score 1 Victory Point.">Slay the Warlord</span>, <span tip="The first unit, of any kind, to be removed as a casualty during the game is worth 1 Victory Point to the opposing player at the end of the game.">First Blood</span>, <span tip="If, at the end of the game, you have at least one model from one or more scoring or denial units in the enemy\'s deployment zone,you score 1 victory Point.">Linebreaker</span></p>
			<h3>Game Length</h3>
			<p><span tip="At the end of game turn 5, one of the players must roll a D6. On a roll of 3+ the game continues, otherwise the game is over. If another turn is played, another D6 must be rolled at the end of game turn 6, and this time, the game only continues on a roll of 4 or more. The battle automatically ends at the close of game turn 7.">Variable</span></p>
			<h3>Special Rules</h3>
			<p><span tip="Roll a D6 before deployment: on a roll of 4+,the Night Fighting special rule is in effect during game turn l. If the Night Fighting rules did not take effect during game turn l, roll a D6 at the start of Game Turn 5, On a roll of 4+,the Night Fighting rules are used for the rest of the game. On a roll of 3 or less, you must roll again at the start of every subsequent game turn - as soon as a ro11 of 4+ is rolled, the Night Fighting rules come into play for the rest of the game.">Night Fighting</span>, <span tip="Any unit that moves within 3 inches of an objective, or is within 3 inches at the start of the first turn, must identify the nature of it. While any unit can identify the narure of an objective, only scoring units can make use of it. If there is more than one scoring unit within range of an objective, the unit with the closest model is considered to be in control. If two or more units are an equal distance frorn the objective, randomize which is in control.">Mysterious Objectives</span>, <span tip="When deploying their armies, players can choose not to deploy up to half of their units, rounding up, keeping them as reserves to arrive later. Units which must start in reserve are ignored. At the start of your turn 2, you must roll a D6 for each unit in reserve. It arrives on a 3 or more. Arriving rseserves move before other units.">Reserves</span>, <span tip="Fast attack units count as scoring, including mobile vehicles.">Fast Recon</span></p>
		</div>
		<div id="the_emperors_will" class="hidden">
			<h2>The Emperor's Will</h2>
			<h3>Victory Conditions</h3>
			<p>At the end of the game, the player who has scored the most Victory Points wins the game. If players have the same number of Victory Points, the game is a draw.</p>
			<h3>Primary Objectives</h3>
			<p>At the end of the game, the Relic is worth 3 Victory Points to the player who has seized it.</p>
			<h3>Secondary Objectives</h3>
			<p><span tip="If, at the end of the game, the enemy\'s Warlord has been slain, you score 1 Victory Point.">Slay the Warlord</span>, <span tip="The first unit, of any kind, to be removed as a casualty during the game is worth 1 Victory Point to the opposing player at the end of the game.">First Blood</span>, <span tip="If, at the end of the game, you have at least one model from one or more scoring or denial units in the enemy\'s deployment zone,you score 1 victory Point.">Linebreaker</span></p>
			<h3>Game Length</h3>
			<p><span tip="At the end of game turn 5, one of the players must roll a D6. On a roll of 3+ the game continues, otherwise the game is over. If another turn is played, another D6 must be rolled at the end of game turn 6, and this time, the game only continues on a roll of 4 or more. The battle automatically ends at the close of game turn 7.">Variable</span></p>
			<h3>Special Rules</h3>
			<p><span tip="Roll a D6 before deployment: on a roll of 4+,the Night Fighting special rule is in effect during game turn l. If the Night Fighting rules did not take effect during game turn l, roll a D6 at the start of Game Turn 5, On a roll of 4+,the Night Fighting rules are used for the rest of the game. On a roll of 3 or less, you must roll again at the start of every subsequent game turn - as soon as a ro11 of 4+ is rolled, the Night Fighting rules come into play for the rest of the game.">Night Fighting</span>, <span tip="Any unit that moves within 3 inches of an objective, or is within 3 inches at the start of the first turn, must identify the nature of it. While any unit can identify the narure of an objective, only scoring units can make use of it. If there is more than one scoring unit within range of an objective, the unit with the closest model is considered to be in control. If two or more units are an equal distance frorn the objective, randomize which is in control.">Mysterious Objectives</span>, <span tip="When deploying their armies, players can choose not to deploy up to half of their units, rounding up, keeping them as reserves to arrive later. Units which must start in reserve are ignored. At the start of your turn 2, you must roll a D6 for each unit in reserve. It arrives on a 3 or more. Arriving rseserves move before other units.">Reserves</span></p>
		</div>
		<div id="the_relic" class="hidden">
			<h2>The Relic</h2>
			<h3>Victory Conditions</h3>
			<p>At the end of the game, the player who has scored the most Victory Points wins the game. If players have the same number of Victory Points, the game is a draw.</p>
			<h3>Primary Objectives</h3>
			<p>At the end of the game, the Relic is worth 3 Victory Points to the player who has <span tip="If a model from a scoring unit is in posession of the Relic at the end of the game, it has seized the Relic.">seized</span> it.</p>
			<h3>Secondary Objectives</h3>
			<p><span tip="If, at the end of the game, the enemy\'s Warlord has been slain, you score 1 Victory Point.">Slay the Warlord</span>, <span tip="The first unit, of any kind, to be removed as a casualty during the game is worth 1 Victory Point to the opposing player at the end of the game.">First Blood</span>, <span tip="If, at the end of the game, you have at least one model from one or more scoring or denial units in the enemy\'s deployment zone,you score 1 victory Point.">Linebreaker</span></p>
			<h3>Game Length</h3>
			<p><span tip="At the end of game turn 5, one of the players must roll a D6. On a roll of 3+ the game continues, otherwise the game is over. If another turn is played, another D6 must be rolled at the end of game turn 6, and this time, the game only continues on a roll of 4 or more. The battle automatically ends at the close of game turn 7.">Variable</span></p>
			<h3>Special Rules</h3>
			<p><span tip="If a mission has the l.Iight Fighting special rule, ro11 a D6 before deployment: on a ro11 of 4+,the Night Fighting special rule is in effect during game turn l. If the Night Fighting rules did not take effect during game turn l, roll a D6 at the start of Game Turn 5, On a roll of 4+,the Night Fighting rules are used for the rest of the game. On a roll of 3 or less, you must roll again at the start of every subsequent game turn - as soon as a ro11 of 4+ is rolled, the Night Fighting rules come into play for the rest of the game.">Night Fighting</span>, <span tip="When deploying their armies, players can choose not to deploy up to half of their units, rounding up, keeping them as reserves to arrive later. Units which must start in reserve are ignored. At the start of your turn 2, you must roll a D6 for each unit in reserve. It arrives on a 3 or more. Arriving rseserves move before other units.">Reserves</span>, <span tip="A model in a scoring unit may seize the relic by moving into contact with it during the movement phase. A model carrying the relic may never move more than 6 inches in one phase, and may not run.  The relic may be handed off once per Movement Phase at the end of the phase. A model that is destroyed or falls back drops the Relic 1 inch away.">The Relic</span></p>
		</div>
		
		<!-- Special Missions -->
		
		<div id="the_pact_of_blood" class="hidden">
			<h2>The Pact of Blood</h2>
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
		<p>&copy; Christopher Cline 2012</p>
	</div>
	
</div>
</body>
</html>
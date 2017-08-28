<?php 
	include '../INCLUDES/header.php'; 

	if(isset($_SESSION["id"])) {
        header("location: main.php");
    }
?>
	
  	<div class="row banner">
    	<div class="col-lg-12">
    		<div>
    			<h1>Intern</h1>
    			<h2><?php echo $error; ?></h2>
    			<h2>Vind een stage plek op een leuke manier!</h2>
    		<!-- 	<p>Deze website gaat je helpen om een stage te vinden in no time!<br> Zolang je ons vertrouwt met je persoonlijke gegevens komt het helemaal goed xoxo.</p> -->
    			<a class="btn" href="https://sappigejongens.nl/stinder/PHP/register.php?type=company">Registreer als bedrijf!</a>	
    			<a class="btn" href="https://sappigejongens.nl/stinder/PHP/register.php">Registreer als leerling!</a>
			</div>

    	</div>
 	</div>

 	<div class="row about">
    	<div class="col-lg-4" >
    		<div>	
    			<h3>Over Intern</h3>
    			<p>Intern is een web applicatie waarmee je in contact kan komen met misschien een toekomstig stage bedrijf.<br>Wij zonderen ons af van websites zoals Stagemarkt.nl omdat je bij ons een account het met de soort stage die je zoekt en je word gematched met een bedrijf als een bedrijf interesse in jou heeft. <br> Op deze manier weet je al dat er een bedrijf is die waarschijnlijk perfect voor jou is. </p>
    		</div>
    	</div>

    	<div class="col-lg-4" >
    		<div>
    			<h3>Over Dusty</h3>
    			<p>Dusty weet niet zo goed wat hij moet met ze leven(Same stiekem), hij heeft volgens mij 2/3 van zijn tijd zitten nadenken over wat hij uberhaubt met ze leven doet.<br><br> Dit vind ik mooi aan Dusty, het enige wat niet zo mooi aan hem is, is wanneer hij flext dan word ik een beetje jaloers en dat weet hij zelf ook donders goed xoxoxo. Ik moet meer shit zeggen om dit op te vullen.</p>
    		</div>
    	</div>

    	<div class="col-lg-4" >
    		<div>
    			<h3>Over ons</h3>
    			<p>Wij zijn een groep van 3 studenten die vrij weinig te doen hebben dus maar deze website maken in hun vrije tijd<br> Wij doen niet aan documentatie en op die moment weet ik niet zo goed wat ik hier nog kan zetten dus ik tik een beetje door yo klik <a href="">hier!</a> <br><br> Je kan daar meer over ons te weten komen als je wilt natuurlijk ik force je niet ofzo maar ik heb wel me best gedaan. </p>
    		</div>
    	</div>
 	</div>

 	<div class="row quote">
    	<div class="col-lg-12">
    		<p>'Wij flexen op de beat van het leven'</p>
      	</div>
 	</div>

 	<div class="row dev">	
 		<h3>Devs</h3>
 		<div class="col-lg-4">
 			<h4>Jerry Geerts</h4>
 			<p></p>
 			<div class="circle"></div>
 		</div>
 		<div class="col-lg-4">
			<h4>Niels van Oeffel</h4>
 			<p></p>
 			<div class="circle"></div>
 		</div>
 		<div class="col-lg-4">
			<h4>Tim Lange</h4>
			<p></p>	
			<div class="circle"></div>
 		</div>
 	</div>

<script type="text/javascript">

	$(document).ready(function () {
    	$('.banner div').hide().fadeIn(1000);
	});

</script>
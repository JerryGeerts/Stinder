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
    			<a class="btn" href="https://sappigejongens.nl/stinder/PHP/register.php?type=company">Registreer als bedrijf!</a>	
    			<a class="btn" href="https://sappigejongens.nl/stinder/PHP/register.php">Registreer als leerling!</a>
			</div>

    	</div>
 	</div>

 	<div class="row about">
    	<div class="col-lg-4" >
    		<div>	
    			<h3>Lorem ipsum</h3>
    			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sagittis turpis in diam sollicitudin, sed ornare diam pretium. Aenean finibus, .<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sagittis turpis in diam sollicitudin, sed ornare diam pretium. Aenean finibus, . <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sagittis turpis in diam sollicitudin, sed ornare diam pretium. Aenean finibus, . </p>
    		</div>
    	</div>

    	<div class="col-lg-4" >
    		<div>
    			<h3>Lorem ipsum</h3>
    			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sagittis turpis in diam sollicitudin, sed ornare diam pretium. Aenean finibus, .<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sagittis turpis in diam sollicitudin, sed ornare diam pretium. Aenean finibus, . <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sagittis turpis in diam sollicitudin, sed ornare diam pretium. Aenean finibus, . </p>
    		</div>
    	</div>

    	<div class="col-lg-4" >
    		<div>
    			<h3>Lorem ipsum</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sagittis turpis in diam sollicitudin, sed ornare diam pretium. Aenean finibus, .<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sagittis turpis in diam sollicitudin, sed ornare diam pretium. Aenean finibus, . <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sagittis turpis in diam sollicitudin, sed ornare diam pretium. Aenean finibus, . </p>
    		</div>
    	</div>
 	</div>

 	<div class="row quote">
    	<div class="col-lg-12">
    		<p>'Lorem ipsum Suspendisse '</p>
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
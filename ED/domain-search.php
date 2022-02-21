<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width minimum-scale=1.0 maximum-scale=1.0" />
  <title>Domains-search</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'><link rel="stylesheet" href="assets/style.css">
	<link type="text/css" rel="stylesheet" href="assets/demo.css" />
	<link type="text/css" rel="stylesheet" href="assets/bootstrap4.css" />
		<link type="text/css" rel="stylesheet" href="assets/mmenu.css" />

</head>

<body>

<!--
    <<  NAVIGATION >>
-->

<?php include('nav.php'); ?>

<!--
    <<  CONTENT >>
-->


<section class="bodypage" style="position: relative;top: -50px;">
		<div class="header-banner" style="background-image:url(img/partners.jpg);background-repeat:no-repeat; background-position:center center;height:500px">
	
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="banner-head">
				<h1>Domain Search </h1>
  				<h3>Tagline</h3>
		</div>
		</div>
		</div>
		</div>
		<div class="overlay">
		<div class="container">
		<form method=GET action="<?php htmlentities(basename(_FILE_)); ?>"> <input type=text name="q" class="searchTerm" value="<?php echo htmlentities($_REQUEST["q"]); ?>"> <input 
		type=submit value="search" class="searchButton"> </form>
		</div>
		</div>	
		</div>
	<div class="bodypage">
		<div class="container">
			<div class="main-head text-center">
		<h1> </h1>
			</div>

			
				<div class="row">
				<br><br><br>
				
				<pre><?php /*

		 * whois.php
		 */ main(); function main(){
		  $domain = $_REQUEST['q'];

		
                  if (!$domain) {
                        return FALSE;
                  }

		echo is_domain_available($domain);


		}

		function is_domain_available($domain) {
   			return checkdnsrr($domain, 'ANY') ? $domain . ' is already registered' : $domain . ' is available';
		}

		?>
		
		</div>
		</div>
		</div>
	

<!--
    <<  FOOTER >>
-->
  
<?php include('footer.php'); ?>


<!--
    <<  SCRIPTS >>
-->


		<script src="assets/mmenu.polyfills.js"></script>
		<script src="assets/mmenu.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script>
			new Mmenu( document.querySelector( '#menu' ));

			document.addEventListener( 'click', function( evnt ) {
				var anchor = evnt.target.closest( 'a[href^="#/"]' );
				
			});
		</script>
</body>
</html>
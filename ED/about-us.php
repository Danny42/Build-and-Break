<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width minimum-scale=1.0 maximum-scale=1.0" />
  <title>Domains Nav menu</title>
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
		<div class="header-banner" style="background-image:url(img/about.jpg);background-repeat:no-repeat; background-position:center center;height:300px">
		<div class="overlay1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="banner-head">
				<h1>About Us</h1>
  				<h3>Tagline</h3>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>



		
		<div class="section">
<div class="container">
	<div class="row">
	<div class="col-md-12">
	<h3 class="heading text-center">What we are all About</h3>
	<div class="heading-divider"></div>
	<div class="services-list">
	<div class="row">
	<div class="col-md-12">
	<!--<h5>Put something here to fill the subheading for the about section</h5>-->
	<p>Enterprise Domains can register, manage and secure your domain name. With our specialised services, features and tools, we secure user’s realm of authority on the Internet and makes it possible for individuals and businesses to create an online presence. We provide to your exact business needs, whether you’re a solopreneur, a small business, or a large corporation.</p>
	</div>
	

	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>




	
	<div class="section">
<div class="container">
	<div class="row">
	<div class="col-md-12">
	<h3 class="heading text-center">The Services We Provide</h3>
	<div class="heading-divider"></div>
	<div class="services-list">
	<div class="row">
	<div class="col-md-3"><div class="single-service"><h5>Domain Registration/Transfer</h5>
	<p>Lorem Ipsum</p>

	</div>
	</div>
	<div class="col-md-3"><div class="single-service"><h5>Private Registration</h5>
	<p>Lorem Ipsum</p>

	</div>
	</div>
	<div class="col-md-3"><div class="single-service"><h5>Domain name Parking</h5>
	<p>Lorem Ipsum</p>

	</div>
	</div>
	<div class="col-md-3"><div class="single-service"><h5>Renewal Reminders</h5>
	<p>Lorem Ipsum</p>

	</div>
	</div>

	</div>
	<div class="row">
	<div class="col-md-3"><div class="single-service">
	<h5>Domain Name Locking</h5>
	<p>Lorem Ipsum</p>
	</div>
	</div>
	<div class="col-md-3"><div class="single-service">
	<h5>Redundant DNS Servers</h5>
	<p>Lorem Ipsum</p>

	</div>
	</div>
	<div class="col-md-3"><div class="single-service">
	<h5>Choice of Domain Extension</h5>
	<p>Lorem Ipsum</p>

	</div>
	</div>
	<div class="col-md-3"><div class="single-service">
	<h5>24/7 Customer Support</h5>
	<p>Lorem Ipsum</p>

	</div>
	</div>
	<div class="col-md-3"><div class="single-service">
	<h5>DNS Hosting</h5>
	<p>Lorem Ipsum</p>

	</div>
	</div>

	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>

</section>

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
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

<section class="bodypage"style="position: relative;top: -50px;">


<div class="header-banner" style="background-image:url(img/contact.jpg);background-repeat:no-repeat; background-position:center center;height:300px">
		<div class="overlay1"><div class="container">
		
			<div class="row">
				<div class="col-md-12">
					<div class="banner-head">
				<h1>Contact Us</h1>
  				<h3>Tagline</h3>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
	</section>

<section class="body">
	<div class="section">
	<div class="container">
	<div class="row">
	<div class="col-md-12">
	<h3 class="heading text-center">Get in Touch</h3>
	<div class="heading-divider"></div>
	<div class="services-list">
	<div class="row">
	<div class="col-md-12"><div class="formcontainer">
  <form action="action_page.php">

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div></div>


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
	<h3 class="heading text-center">Partners</h3>
	<div class="heading-divider"></div>
	<div class="services-list">
	<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4"></div>
	<div class="col-md-4"></div>

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
<style>
	
/* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color:#4fc7f4;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #3f9ec0;
}

/* Add a background color and some padding around the form */
.formcontainer {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

</style>

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
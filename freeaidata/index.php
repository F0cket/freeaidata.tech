<?php
	session_start();
	require 'auth.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Free AI Data</title>
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">        
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="styles/style.css" rel="stylesheet">
		<link href="styles/test.css" rel="stylesheet">
      </head>
      <body>
      
        <!--Begin Navbar-->
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Free AI Data</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <!--Navbar items-->
            <ul class="navbar-nav me-auto">

              <li class="nav-item">
		<a class="nav-link" href="login.php">Login</a>
		</li>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">About</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="about.php">About Us</a></li>
                  <li><a class="dropdown-item" href="contact.php">Contact</a></li>
                  <li><a class="dropdown-item" href="privacy.php">Privacy Policy</a></li>
                  <li><a class="dropdown-item" href="ethics.php">Ethical Guidelines</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav><!--End Navbar-->

	<div id="intro">
      <div class="text-center">
        <h1>Welcome!</h1>
      </div>
      <div class="container ">
      
      <div>
      <img src="images/AI-Mascot.gif" class="center">
    </div>
    <div>
    <p id="butter">Welcome to the site! In order to upload to the site or browse the data you have to be logged in. Please <a id="reg" href="login.php">login</a> or <a id="reg" href="register.php">register</a> to view all Free AI Data has to offer.</P>
    <br>
  </div>
</div>
</div>
  <div id="about">
    <div class="container">
      <br>
      <h5>What is Free AI Data?</h5>
      <p>Freeaidata.tech is free open source project that allows anyone to download ethically sourced data that has been uploaded by users and can be used in training AI. Along with this users are able to see various ethical guidelines that users can follow or refer to when using data that is sourced for training AI. Created by Group 4 as their project for IT 369 Fall 2021. Find out more on the <a id="light" href="about.php">about</a> page</p>
      <br>
    </div>
  </div>
  <div id="ethics">
   <div class="container ">
     <br>
     <h5>Ethical Guidelines</h5>
      <p>In order for Free AI Data to serve its purpose to the community. It is important that the data hosted on the site is ethically sourced. That is why all users who upload to the site must read and agree to our ethical guidelines. Our ethical guidelines are formed from research conducted from around the AI community. Gaining insight from organizations such as Microsoft, IBM, Google, etc. These guidelines will give confidence to AI developers and consumers in the training data that is being used to develop the future of AI.</P>
      <br>
      <p>Here is an overview of our <a id="reg" href="ethics.php">guidelines</a> [5 C's is placeholder for now]</p>
      <p>5 C's:<br>
        Consent between data provider and service<br>
        Clarity of what a user is consenting to<br>
        Consistency & Trust in data providers and users<br>
        Control & Transparency over the use of data<br>
        Consequences should be further explored prior to data usage <br>
      </P>
      <br>
    </div>
  </div>
      </body>
</html>

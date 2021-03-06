<?php
	session_start();
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

			<?php
			if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>
				<li class="nav-item">
                <a class="nav-link" href="upload.php">Upload</a>
              </li>
			  
              <!-- This is the drop-down section of the navbar-->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Browse</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="viewtexts.php">Text</a></li>
                  <li><a class="dropdown-item" href="viewimages.php">Image</a></li>
                  <li><a class="dropdown-item" href="viewvideos.php">Video</a></li>
                  <li><a class="dropdown-item" href="viewaudio.php">Audio</a></li>
                </ul>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="info.txt">Blockchain</a>
              </li>
			<?php } else {?>
				<li class="nav-item">
				<a class="nav-link" href="login.php">Login</a>
			</li>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>
			<?php }?>
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
			<?php
			if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){ ?>
				  <!--This is the search function of the navbar-->
				
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
			</ul>
			<?php } ?>
          </div>
        </div>
      </nav><!--End Navbar-->
      
  <div id="contact">
        <form action="#php">
          <h1>Contact Us</h1>
          <hr>
          <label for="name"><b>Your Name</b></label><br>
          <input type="text" id="name" placeholder="Name" name="name" ><br>
      
          <label for="email"><b>Your Email</b></label><br>
          <input type="text" id="email" placeholder="Email" name="email" ><br>

          <label for="message"><b>Your Message</b></label><br>
           <input type="text" class="message1" id="message" placeholder="Message" name="message" ><br>          
  	</form>
  </div>
	<!-- Borrowed from the login -->
	<div class="text-center">
            <input type="submit" class="myButton btn" value="Send Message">
          </div>


</body>
</html>
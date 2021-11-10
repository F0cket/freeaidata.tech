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
                <a class="nav-link" href="upload.html">Upload</a>
              </li>
			  
              <!-- This is the drop-down section of the navbar-->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Browse</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="viewtexts.html">Text</a></li>
                  <li><a class="dropdown-item" href="viewimages.html">Image</a></li>
                  <li><a class="dropdown-item" href="viewvideos.html">Video</a></li>
                  <li><a class="dropdown-item" href="viewaudio.html">Audio</a></li>
                </ul>
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
				<form class="d-flex">
				  <input class="form-control me-2" type="text" placeholder="Search">
				  <a class="nav-link" type="button" onClick="location.href='search.html'">Search</a>
				</form>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
			</ul>
			<?php } ?>
          </div>
        </div>
      </nav><!--End Navbar-->
      
      <div class="container-fluid mt-3">
        <h3>Ethical Guidelines</h3>
        <p>
		Prior Research <br>
		•	5 C’s <br>
o	Consent between data provider and service<br>
o	Clarity of what a user is consenting to<br>
o	Consistency & Trust in data providers and users<br>
o	Control & Transparency over the use of data<br>
o	Consequences should be further explored prior to data usage <br>
•	Data bias should be identified and mitigated<br>
•	Algorithm bias should be identified and mitigated<br>
•	Data should be used in proper context<br>
•	AI training models should be adjusted for model drift<br><br>


Microsoft - https://www.microsoft.com/en-us/ai/responsible-ai?activetab=pivot1%3aprimaryr6<br>
•	Fairness – AI systems should treat all people fairly<br>
•	Inclusiveness – AI systems should empower everyone and engage people<br>
•	Reliability & Safety – AI systems should perform reliably and safely<br>
•	Transparency – AI systems should be understandable<br>
•	Privacy & Security – AI systems should be secure and respect privacy<br>
•	Accountability – People should be accountable for AI systems<br><br>

Google - https://ai.google/principles/<br>
•	Be socially beneficial – Consider social, economic, and legal factors when making AI<br>
•	Avoid creating or reinforcing unfair bias – Including but not limited to race, ethnicity, gender, nationality, income, sexual orientation, ability, political beliefs, and religious beliefs<br>
•	Be built and tested for safety – Apply strong safety and security practices to avoid risk of harm<br>
•	Be accountable to people – Provide opportunities for feedback, relevant explanations, and appeal<br>
•	Incorporate privacy design principles – Give opportunity for notice and consent, apply privacy safeguards, and provide transparency and control over the use of data<br>
•	Uphold high standards of scientific excellence – Promote thoughtful leadership, draw on multidisciplinary approaches, responsibly share AI knowledge and research which may enable others to develop useful AI applications.<br>
•	Be made available for uses that accord with these principles – Many technologies have multiple uses, we work to limit any potentially harmful or abusive applications<br>
•	******* Will not pursue following applications:<br>
o	Technology likely to cause harm <br>
o	Weapons or other technology which the principal purpose is injuring other people<br>
o	Technologies which gather or use information for surveillance violating accepted norms<br>
o	Technologies whose purpose contravenes widely accepted international laws and/or human rights<br><br>

IBM - https://www.ibm.com/watson/assets/duo/pdf/everydayethics.pdf<br>
•	Accountability – AI designers and developers are responsible for considering AI design, development, decision process, and outcomes.<br>
•	Value Alignment – AI should be designed to align with the norms and values of your user group in mind.<br>
•	Explainability – AI should be designed for humans to easily perceive, detect, and understand its decision process.<br>
•	Fairness – AI must be designed to minimize bias and promote inclusive representation. <br>
•	User Data Rights – AI must be designed to protect user data and preserve the user’s power over access and uses.<br>
</p>
      </div>
      
      </body>
</html>
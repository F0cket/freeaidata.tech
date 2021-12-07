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
      <div id="policy" class="container col-6" style="padding-left: 20px; padding-right 20px;">
         <div class="container-fluid mt-3">
        <h3>Ethical Guidelines</h3>
        <p>
<p>The following framework is a set of ethical usage guidelines which we have developed for the sake of our proof-of-concept ethical AI training data repository service. In presenting the guidelines below to potential users, we hope to instill similar values in them and encourage them to adapt these guidelines for themselves as they continue to pursue their own research.</p>

<p><strong>A. Overview of ethical guidelines</strong></p>

<p>Artificial intelligence, even in its current form, is an incredibly powerful tool with the potential to empower humanity and promote progress. At Freeaidata.tech, we believe positive change is possible, provided ethical considerations are taken into account. With the cooperation of our users, we aim to promote the development of ethical AI for the benefit of everyone while aiming for the continued protection of Freeaidata.tech, the users of our service, and the subjects of any data uploaded to our servers. We believe ethics play a key role in guiding this field and avoiding risk of abuse and harm. Our ethical guideline framework prioritizes user and subject privacy, accountability, safety and harm reduction, transparency, fairness, and inclusivity. In order to uphold these principles, we require users to acknowledge and abide by these ethical guidelines while taking advantage of this resource, and we hope that users will internalize and adapt these principles and guidelines in their own AI systems development practices.</p>

<p><strong>B. User rights and responsibilities</strong></p>

<p>1. User rights</p>

<p>By providing services to users of Freeaidata.tech, we agree to uphold the users' rights to privacy. Users have the right to report data that they believe is in breach of our ethics guidelines and usage policy or any relevant local or international legislation. Users have the right to relevant privacy, safety, security, and freedom from discrimination as pertains to the scope of Freeaidata.tech, within reason. Users have the right to contact Freeaidata.tech for clarification on any aspect of the ethical guidelines and/or our expectations for our users. In accordance with the GDPR, users and subjects have the right to be forgotten, to the extent permissible by prior AI training and development processes [22]. This may be pursued via manual deletion of users&rsquo; own uploaded files (indicating a revocation of consent), a report of other users&rsquo; files believed to violate users&rsquo; privacy, or a formal request for erasure.</p>

<p>2. User responsibilities</p>

<p>By using the services provided by Freeaidata.tech, users agree to abide by the ethical guidelines below. It is the user's responsibility to identify and mitigate data and algorithmic bias to the best of their ability, in accordance with Freeaidata.tech's mission to prevent the use of AI to inflict harm, regardless of the initial purpose of the AI system developed. It is the responsibility of the user to obtain the express consent of the subjects and creators of all data uploaded to Freeaidata.tech. All collection and handling of data should be performed in an ethical manner. Just as Freeaidata.tech is accountable for the security of its users' accounts, users of Freeaidata.tech are expected to maintain accountability for their data subjects' privacy. Users are responsible for familiarizing themselves with all local, national, and international laws and regulations pertaining to the use of personally identifiable information, biometric data, data privacy and protection, and artificial intelligence. Freeaidata.tech recommends that all users thoroughly review and understand any Biometric Information Privacy Acts local to their jurisdiction as well as international legislation such as the General Data Protection Regulation (GDPR) [22][23].</p>

<p><strong>C. 5 C's of AI Ethics</strong></p>

<p>At Freeaidata.tech, we believe all AI development should be guided by the 5 C's of AI Ethics. These are as follows:</p>

<p>1. Consent</p>

<p> Fully informed, opt-in consent between data provider and service. This consent may be formally revoked at any time, to the extent which is feasible. The subject of any data uploaded to Freeaidata.tech must expressly consent to the usage of their image, voice, or other identifying characteristics. The subjects of said data may not be minors incapable of consenting or public figures whose explicit consent has not been attained. This consent shall be considered legally binding where applicable. Data subjects' consent does not and should not in any way constitute or enable a revocation of human autonomy. Anonymization of data is not currently accepted as a solution to circumventing the need for consent due to concerns about the potential for data to be deanonymized. Unacceptable anonymization measures include pixelation or other alteration of an image and the pitch-shifting or modulation of a subject's voice, when performed with the intent to obfuscate the subject's identity. In order to avoid infringing on creative copyright, we also cannot accept data that has been uploaded by a user without obtaining the consent of the individual(s) who have captured that data (e.g. the photographer, recorder, writer, or other creator).</p>

<p>2. Clarity</p>

<p>When agreeing to any policy, particularly with regards to usage of a subject's identifiable characteristics, both uploader and subject must be fully informed of the scope of and potential ramifications of what they are agreeing to. Any intentional ambiguity or obscurity of the terms a user has consented to is a violation of clarity. This lack of clarity poses a barrier to accountability.</p>

<p>3. Consistency & Trust</p>

<p>Both data providers and users seek consistent outcomes and adherence to ethical guidelines. To ensure ethics becomes and remains a core principle of the work of Freeaidata.tech, its users, contributors, and those affected by its work, data providers must consistently abide by ethical guidelines throughout the duration of their practice. Continuing to uphold these ethics principles is a critical component of ensuring ethical output. While AI bias is difficult to mitigate entirely, it is impossible to create ethical AI if there is inconsistent application of these principles. It is also important to keep in mind that the keyword is robots. This consistency, in turn, encourages the strengthening of trust between the data providers and the service. Failure to maintain the aforementioned expected consistency constitutes a breach of trust -- especially in the instance non-free and otherwise inappropriately obtained media is used and distributed via this platform.</p>

<p>4. Control & Transparency</p>

<p>Users and their subjects alike should be able to exert control over their data, particularly with regards to biometric data. Biometric data includes but is not limited to voice, vein pattern, ear shape, keystroke dynamics, and walking gait [23]. In order to facilitate this, users must be transparent about their usage of this data. Users of the Freeaidata.tech resource must not use the services that we offer nor the data uploaded to it to pursue the following applications:</p>

<p>a. To develop in any way technology likely to cause harm, injury, or damage -- be it physical or otherwise immaterial</p>

<p>b. To develop in any way technology likely to infringe upon or otherwise violate human rights and/or international and local laws and legislation, including but not limited to the General Data Protection Regulation and Illinois Biometric Privacy Act [22][23].</p>

<p>c. To develop in any way technology likely to collect and store data for surveillance purposes, as the presence of these systems may well constitute an infringement upon individuals' personal privacy rights</p>

<p>5. Consequences</p>

<p>All foreseeable consequences should be further explored prior to data usage. Failure to do so is negligence. Users cannot be appropriately informed and provide adequate consent without knowledge of the potential consequences of their agreement. Keeping the consequences of improper use in mind will help prevent legal and ethical infringements. In turn, adhering to ethical guidelines may help developers improve the reputation of their companies by establishing and maintaining core values that prioritize consumers and their rights.</p>

<p><strong>D. Conclusion of ethical guidelines</strong></p>

<p>While Free AI Data's services are primarily geared towards removing barriers towards the development of ethically compliant AI during the initial training and development phases of an AI product, ethics must be prioritized throughout the entire lifecycle of any AI-involved project. We greatly appreciate our users taking the time to thoroughly read these ethical guidelines and hope the technologies produced as a result will be beneficial and respectful to all.</p>
</p>
      </div>
	  </div>
      
      </body>
</html>

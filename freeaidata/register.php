<?php
require_once "../config.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = $captcha_err = "";
$captcha;
 
  /*Basis for Login/Register system is from TutorialRepublic
 Their tutorial can be found here: https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php 
 Other login/register systems may be more secure in real-world deployment.  */
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Invalid username. Must only contain letters, numbers, and unerscores";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            

            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password length must be 6 characters";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    if(isset($_POST['g-recaptcha-response'])){
	$captcha=$_POST['g-recaptcha-response'];
    }
    if(!$captcha){
	$captcha_err = "Please check captcha";
}

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($captcha_err)){
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title>Sign up</title>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="styles/style.css" rel="stylesheet">
	<script src='https://www.google.com/recaptcha/api.js'></script>
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
      
      <div id="sign-in">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <h1>Sign Up</h1>
          <hr>
          <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
      
            <p>By creating your account you agree to our terms of service and our <a href="privacy.php">privacy Policy</a></p>
      		
	<br>
	<div>
		<?php echo (!empty($captcha_err)) ? '<p style="color:red;">Please check captcha</p>' : ''; ?>
		<div class="g-recaptcha" id="recaptch" data-sitekey="6Lf-pTgdAAAAAF70xqR7RKiMwCPCBqUJ1j0iAA5W" style="display:none"></div>
	</div>

          <div style="margin-top: 0px;">
            <button type="button" id="cancel" onclick="location.href='index.php'" class="myButton btn" style="margin-top: 4px;">Cancel</button>
            <button type="button" id="signup" class="myButton btn" onclick="modalReset()" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-top: 4px;">Sign Up</button>
			<input type="submit" id="submit" class="myButton btn btn-secondary center" data-bs-dismiss="modal" style="display:none;" value="Register">
          </div>
        
        </div>
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 1000px;">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Ethical Guidelines</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body modal-lg" style="max-width: none;">
					<div class="container-fluid" id="framers">
						<iframe src="ethics.html" title="Ethical Guidelines"></iframe>
					</div>
					<div class="container-fluid" style="display:none" id="section">
						<div>
							<p>This is the ethical guideline quiz. You are required to comeplete this quiz with a score of XX% in order to register your account. It is important that all users who are interacting with the site are following the ethical guidelines which this why this quiz is required for registration.</p><br>
						</div>
						<div id="wrapper"></div>
					</div>
					
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
					<div class="center">
						
						<button type="button" id="continue" class="myButton btn btn-pimary center" onclick="toQuiz()">Continue</button>
						<button type="button" id="next" class="myButton btn btn-pimary center" onclick="displayQuiz()" style="display:none;">Next</button>
						<button type="button" id="ok" class="myButton btn btn-pimary center" data-bs-dismiss="modal" style="display:none;">Okay</button>
						
					</div>
					
                </div>
        </form>

          </div>
        </div>
      </div>

	<!--Start of Java code -->
	<script type="text/javascript">
	//	$(document).ready(function(){
	//		$("p").dblclick(function(){
	//		 $(this).hide();
	//		});
	//	});
		var correctCount = 0;
		var quizCount = 0;
		var prevCount = 0;
		var choosers = [];
		const questions = [];
		const answers = [];
		
		answers[0] = 'A';
		questions[0] = '<div class=\"question\">' +
							'<h5>Which of the following is one of the 5 C\’s of ethical AI data?</h5>' +
							'<input type=\"radio\" id=\"A\" name="qustion\" value=\"A\">' +
							'<label for=\"A\">A. Consent</label><br>' +
							'<input type=\"radio\" id=\"B\" name=\"qustion\" value=\"B\">' +
							'<label for=\"B\">B. Careful</label><br>' +
							'<input type=\"radio\" id=\"C\" name=\"qustion\" value=\"C\">' +
							'<label for=\"C\">C. Conclusive</label><br>' +
							'<input type=\"radio\" id=\"D\" name=\"qustion\" value=\"D\">' +
							'<label for=\"D\">D. Concise</label><br>' +
						 '</div>';	
		answers[1] = 'C';
		questions[1] = '<div class=\"question\">' +
							'<h5>Which of the following is not a principle of freeaidata.tech?</h5>' +
							'<input type=\"radio\" id=\"A\" name="qustion\" value=\"A\">' +
							'<label for=\"A\">A. Accountability</label><br>' +
							'<input type=\"radio\" id=\"B\" name=\"qustion\" value=\"B\">' +
							'<label for=\"B\">B. Transparency</label><br>' +
							'<input type=\"radio\" id=\"C\" name=\"qustion\" value=\"C\">' +
							'<label for=\"C\">C. Accessibility</label><br>' +
							'<input type=\"radio\" id=\"D\" name=\"qustion\" value=\"D\">' +
							'<label for=\"D\">D. Inclusivity</label><br>' +
						 '</div>';	
		answers[2] = 'C';
		questions[2] = '<div class=\"question\">' +
							'<h5>When gathering or using data, the most ethical practice is to avoid _________</h5>' +
							'<input type=\"radio\" id=\"A\" name="qustion\" value=\"A\">' +
							'<label for=\"A\">A. Transparency</label><br>' +
							'<input type=\"radio\" id=\"B\" name=\"qustion\" value=\"B\">' +
							'<label for=\"B\">B. Publicity</label><br>' +
							'<input type=\"radio\" id=\"C\" name=\"qustion\" value=\"C\">' +
							'<label for=\"C\">C. Bias</label><br>' +
							'<input type=\"radio\" id=\"D\" name=\"qustion\" value=\"D\">' +
							'<label for=\"D\">D. Inclusivity</label><br>' +
						 '</div>';	
		answers[3] = 'D';
		questions[3] = '<div class=\"question\">' +
							'<h5>Who should ethical AI benefit?</h5>' +
							'<input type=\"radio\" id=\"A\" name="qustion\" value=\"A\">' +
							'<label for=\"A\">A. The owners</label><br>' +
							'<input type=\"radio\" id=\"B\" name=\"qustion\" value=\"B\">' +
							'<label for=\"B\">B. The users</label><br>' +
							'<input type=\"radio\" id=\"C\" name=\"qustion\" value=\"C\">' +
							'<label for=\"C\">C. The developers</label><br>' +
							'<input type=\"radio\" id=\"D\" name=\"qustion\" value=\"D\">' +
							'<label for=\"D\">D. Everyone</label><br>' +
						 '</div>';	
		answers[4] = 'B';
		questions[4] = '<div class=\"question\">' +
							'<h5>Which of the following may NOT be uploaded to freeaidata.tech?</h5>' +
							'<input type=\"radio\" id=\"A\" name="qustion\" value=\"A\">' +
							'<label for=\"A\">A. Images taken by a known photographer of a subject who has agreed to have their likeness uploaded</label><br>' +
							'<input type=\"radio\" id=\"B\" name=\"qustion\" value=\"B\">' +
							'<label for=\"B\">B. Images taken by an unknown photographer of a subject who has agreed to have their likeness uploaded</label><br>' +
							'<input type=\"radio\" id=\"C\" name=\"qustion\" value=\"C\">' +
							'<label for=\"C\">C. A set of images where the photographer and subject are the same; the subject has agreed to the terms and usage of their likeness and photographic work</label><br>' +
							'<input type=\"radio\" id=\"D\" name=\"qustion\" value=\"D\">' +
							'<label for=\"D\">D. A set of images where there is no human subject; the photographer has consented to their use on freeaidata.tech</label><br>' +
						 '</div>';	
		answers[5] = 'D';
		questions[5] = '<div class=\"question\">' +
							'<h5>Adherence to AI ethical guidelines during the initial training stage is important because:</h5>' +
							'<input type=\"radio\" id=\"A\" name="qustion\" value=\"A\">' +
							'<label for=\"A\">A. Ethical guidelines help inhibit misuse of the finished AI product</label><br>' +
							'<input type=\"radio\" id=\"B\" name=\"qustion\" value=\"B\">' +
							'<label for=\"B\">B. Ethical guidelines help ensure an organization is compliant with existing local and international laws</label><br>' +
							'<input type=\"radio\" id=\"C\" name=\"qustion\" value=\"C\">' +
							'<label for=\"C\">C. Ethical guidelines help establish and promote values at an organization</label><br>' +
							'<input type=\"radio\" id=\"D\" name=\"qustion\" value=\"D\">' +
							'<label for=\"D\">D. Both B and C are correct</label><br>' +
						 '</div>';	
		answers[6] = 'B';
		questions[6] = '<div class=\"question\">' +
							'<h5>Which of the following may be uploaded to freeaidata.tech?</h5>' +
							'<input type=\"radio\" id=\"A\" name="qustion\" value=\"A\">' +
							'<label for=\"A\">A. Images of an adult who has expressed consent but may not understand the full implications of the agreement</label><br>' +
							'<input type=\"radio\" id=\"B\" name=\"qustion\" value=\"B\">' +
							'<label for=\"B\">B. Images of an adult who has expressly consented for their image to be used for this purpose</label><br>' +
							'<input type=\"radio\" id=\"C\" name=\"qustion\" value=\"C\">' +
							'<label for=\"C\">C. Images of a public figure whose likeness is widely known but has not been contacted by the uploader</label><br>' +
							'<input type=\"radio\" id=\"D\" name=\"qustion\" value=\"D\">' +
							'<label for=\"D\">D. Images of an adult who has given an ambiguous or noncommittal response when asked if images of them may be used</label><br>' +
						 '</div>';	
		answers[7] = 'A';
		questions[7] = '<div class=\"question\">' +
							'<h5>All of the following are examples of biometric data: voice, vein pattern, ear shape, walking gait, keystroke dynamics.</h5>' +
							'<input type=\"radio\" id=\"A\" name="qustion\" value=\"A\">' +
							'<label for=\"A\">A. True</label><br>' +
							'<input type=\"radio\" id=\"B\" name=\"qustion\" value=\"B\">' +
							'<label for=\"B\">B. False</label><br>' +
						 '</div>';	
		answers[8] = 'B';
		questions[8] = '<div class=\"question\">' +
							'<h5>It is acceptable and ethical to upload files where the subject has not explicitly agreed and opted-into this usage if appropriate anonymizing measures have been taken (e.g. pixelation/blur of likeness, pitch-shifting/modulation of voice).</h5>' +
							'<input type=\"radio\" id=\"A\" name="qustion\" value=\"A\">' +
							'<label for=\"A\">A. True</label><br>' +
							'<input type=\"radio\" id=\"B\" name=\"qustion\" value=\"B\">' +
							'<label for=\"B\">B. False</label><br>' +
						 '</div>';	
		answers[9] = 'C';
		questions[9] = '<div class=\"question\">' +
							'<h5>Type the keyword hidden in the  Free AI Data Ethical Guidelines below. (Hint: Provided you\'ve actually read the guidelines, you should know this!)</h5>' +
							'<input type=\"radio\" id=\"A\" name="qustion\" value=\"A\">' +
							'<label for=\"A\">A. Free</label><br>' +
							'<input type=\"radio\" id=\"B\" name=\"qustion\" value=\"B\">' +
							'<label for=\"B\">B. Data</label><br>' +
							'<input type=\"radio\" id=\"C\" name=\"qustion\" value=\"C\">' +
							'<label for=\"C\">C. Robots</label><br>' +
							'<input type=\"radio\" id=\"D\" name=\"qustion\" value=\"D\">' +
							'<label for=\"D\">D. AI</label><br>' +
						 '</div>';	
						 

		
		
		
		function displayQuiz() {
			console.log("Begining of function data:");
			console.log("quizCount: " + quizCount + " choosers: " + choosers[quizCount]);
			document.getElementById("ok").style.display = 'none';
			
			switch(choosers[quizCount]) {
				case 0:
					if(quizCount == 0) {
						document.getElementById("wrapper").innerHTML = questions[0];
						quizCount++;
					}
					else if (quizCount > 0 && quizCount < 10) {
						if(document.getElementById(answers[choosers[quizCount-1]]).checked) {
							correctCount++;
						}
						document.getElementById("wrapper").innerHTML = questions[0];
						quizCount++;
					}
					break;
				case 1:
					if(quizCount == 0) {
						document.getElementById("wrapper").innerHTML = questions[1];
						quizCount++;
					}
					else if (quizCount > 0 && quizCount < 10) {
						if(document.getElementById(answers[choosers[quizCount-1]]).checked) {
							correctCount++;
						}
						document.getElementById("wrapper").innerHTML = questions[1];
						quizCount++;
					}
					break;
				case 2:
					if(quizCount == 0) {
						document.getElementById("wrapper").innerHTML = questions[2];
						quizCount++;
					}
					else if (quizCount > 0 && quizCount < 10) {
						if(document.getElementById(answers[choosers[quizCount-1]]).checked) {
							correctCount++;
						}
						document.getElementById("wrapper").innerHTML = questions[2];
						quizCount++;
					}
					break;
				case 3:
					if(quizCount == 0) {
						document.getElementById("wrapper").innerHTML = questions[3];
						quizCount++;
					}
					else if (quizCount > 0 && quizCount < 10) {
						if(document.getElementById(answers[choosers[quizCount-1]]).checked) {
							correctCount++;
						}
						document.getElementById("wrapper").innerHTML = questions[3];
						quizCount++;
					}
					break;
				case 4:
					if(quizCount == 0) {
						document.getElementById("wrapper").innerHTML = questions[4];
						quizCount++;
					}
					else if (quizCount > 0 && quizCount < 10) {
						if(document.getElementById(answers[choosers[quizCount-1]]).checked) {
							correctCount++;
						}
						document.getElementById("wrapper").innerHTML = questions[4];
						quizCount++;
					}
					break;
				case 5:
					if(quizCount == 0) {
						document.getElementById("wrapper").innerHTML = questions[5];
						quizCount++;
					}
					else if (quizCount > 0 && quizCount < 10) {
						if(document.getElementById(answers[choosers[quizCount-1]]).checked) {
							correctCount++;
						}
						document.getElementById("wrapper").innerHTML = questions[5];
						quizCount++;
					}
					break;
				case 6:
					if(quizCount == 0) {
						document.getElementById("wrapper").innerHTML = questions[6];
						quizCount++;
					}
					else if (quizCount > 0 && quizCount < 10) {
						if(document.getElementById(answers[choosers[quizCount-1]]).checked) {
							correctCount++;
						}
						document.getElementById("wrapper").innerHTML = questions[6];
						quizCount++;
					}
					break;
				case 7:
					if(quizCount == 0) {
						document.getElementById("wrapper").innerHTML = questions[7];
						quizCount++;
					}
					else if (quizCount > 0 && quizCount < 10) {
						if(document.getElementById(answers[choosers[quizCount-1]]).checked) {
							correctCount++;
						}
						document.getElementById("wrapper").innerHTML = questions[7];
						quizCount++;
					}
					break;
				case 8:
					if(quizCount == 0) {
						document.getElementById("wrapper").innerHTML = questions[8];
						quizCount++;
					}
					else if (quizCount > 0 && quizCount < 10) {
						if(document.getElementById(answers[choosers[quizCount-1]]).checked){
							correctCount++;
						}
						document.getElementById("wrapper").innerHTML = questions[8];
						quizCount++;
					}
					break;
				case 9:
					if(quizCount == 0) {
						document.getElementById("wrapper").innerHTML = questions[9];
						quizCount++;
					}
					else if (quizCount > 0 && quizCount < 10) {
						if(document.getElementById(answers[choosers[quizCount-1]]).checked) {
							correctCount++;
						}
						document.getElementById("wrapper").innerHTML = questions[9];
						quizCount++;
					}
					break;
				default: {
					if(document.getElementById(answers[choosers[quizCount-1]]).checked) {
						correctCount++;
					}
					if((correctCount/10) >= 0.7) {
						document.getElementById("wrapper").innerHTML = '<div class=\"question text-center\">' +
							'Congratulations! You got: ' + ((correctCount/10)*100) + '%. You can now register an account.' +
						'</div>';
						
						document.getElementById("next").style.display = 'none';
						document.getElementById("submit").style.display = 'block';
						document.getElementById("recaptch").style.display = 'block';
						document.getElementById("ok").style.display = 'block';	
						document.getElementById("cancel").style.display = 'none';
						document.getElementById("signup").style.display = 'none';
					}
					else {
						document.getElementById("wrapper").innerHTML = 'Sorry. You did not pass. Please re-read through the ethical guidelines and try again.'; 
						correctCount = 0;
						quizCount = 0;
						document.getElementById("ok").style.display = 'block';			
						document.getElementById("next").style.display = 'none';		
					}
				
				}
				
				
				
			}
		}
		
		function checkQuiz() {
			
			if(count == 0){
				document.getElementById("wrapper").innerHTML = questions[0];
				count++;
			}
			else if(count == 1){
				if(document.getElementById(answers[0]).checked) {
					correctCount++;
				}
				document.getElementById("wrapper").innerHTML = questions[1];
				count++;
			}
			else {
				if(document.getElementById(answers[1]).checked) {
					correctCount++;
				}
				//document.getElementById("wrapper").innerHTML = 'you answered ' + correctCount + ' correctly.';
				
				var items = "";
				for(i = 0; i < 10; i++){
					items = items + " " + choosers[i];
				}
				document.getElementById("wrapper").innerHTML = items;
			}
		}
		
		function modalReset() {
			document.getElementById("next").style.display = 'none';	
			document.getElementById("section").style.display = 'none';	
			document.getElementById("ok").style.display = 'none';	
			document.getElementById("framers").style.display = 'block';	
			document.getElementById("continue").style.display = 'block';	

			getChoosers();
		}
		
		function toQuiz(){
			document.getElementById("framers").style.display = 'none';	
			document.getElementById("continue").style.display = 'none';			
			displayQuiz();
			document.getElementById("next").style.display = 'block';	
			document.getElementById("section").style.display = 'block';	
		}
		
		function getChoosers() {
			var temp = [99,99,99,99,99,99,99,99,99,99];
			var rando = (getRandomInt(10) + 1);
			var count = 0;
			var flag = false;
			
			while(count < 10) {
			  flag = true;
			  //console.log('----------new loop----------------');
			  for (let j = 0; j < 10; j++) {
				  if(rando == temp[j]) {
					flag = false;
					rando = getRandomInt(10);
					//console.log('found a duplicate random');
					break;	
				  }
				}	
				
				if(flag){
					temp[count] = rando;
					
					//console.log('random number was added to list. count: ' + count + ' choosers element: ' + choosers[count]);
					//console.log('rando: ' + rando);
					count++;
				}
				//console.log('----------end of loop. choosersat9: ' + choosers[9] + ' ----------------');
			}
			
			choosers = temp;
		}
		
		function getRandomInt(max) {
		  return Math.floor(Math.random() * max);
		}
	</script><!--End of Java code -->
	
    </body>
</html>

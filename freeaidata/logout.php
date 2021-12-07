<?php
  /*Basis for Login/Register system is from TutorialRepublic
 Their tutorial can be found here: https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php 
 Other login/register systems may be more secure in real-world deployment.  */
session_start();

$_SESSION = array(); 
session_destroy();

header("location: index.php");
exit;
?>
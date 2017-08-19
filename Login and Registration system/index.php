<?php
 require 'core.inc.php';
 require 'connect_DB.php';

if(loggedin())
{
	echo "User logged in! <a href = 'logout.php'>Log out</a> ";
} else{

	include 'form.inc.php';
}
?>
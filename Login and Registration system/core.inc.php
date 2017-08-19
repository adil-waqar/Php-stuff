<?php
ob_start(); //To redirect page
session_start(); //To start a session
$script_name = $_SERVER['SCRIPT_NAME'];

function loggedin(){
	if(isset($_SESSION['user'])){
		$login = $_SESSION['user'];
		if(!empty($login)){
			return true;
		} else {
			return false;
		}
	}

}
?>
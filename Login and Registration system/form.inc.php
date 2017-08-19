<?php 
require 'connect_DB.php';
if(isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(!empty($username) && !empty($password))
	{
		$password_hash = md5($password);
		
		$query = "SELECT username, password FROM users WHERE username = '$username' AND password = '$password_hash'";
		$query_run = mysqli_query($sqlconnect, $query);
		if($query_run)
		{
			if(mysqli_num_rows($query_run)==0)
			{
				echo "Invalid username or password! ";
			}
			else if (mysqli_num_rows($query_run)==1) {
				$_SESSION['user'] = $username;
				header("Location: index.php");

			}

		}

	}
	else {
		echo 'Please enter username and password! ';
	}

	
}


?>

<form action="<?php echo $script_name; ?>" method="POST">
	Username: <input type="text" name="username"> <br><br>
	Password: <input type="password" name="password"> <br><br>
	<input type="submit" value="Log in">

</form>
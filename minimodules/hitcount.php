<?php
include 'connect_DB.php';
$user_ip = $_SERVER['REMOTE_ADDR']; 

function ip_exists()
{	
	global $user_ip;
	global $sqlconnect;
	$query = "SELECT ip_address FROM hit_ip WHERE ip_address = '$user_ip' ";

	if($query_run = mysqli_query($sqlconnect, $query))
	{
		if(mysqli_num_rows($query_run)==0)
		{
			return false;
		} else if(mysqli_num_rows($query_run)>=1)
		{
			return true;
		}
	} else
	{
		echo mysqli_error($sqlconnect);
	}

}


function add_count()
{
	global $sqlconnect;
	$query_select = 'SELECT count from hit_count';
	if($query_run = mysqli_query( $sqlconnect, $query_select))
	{
		while ($query_row = mysqli_fetch_assoc($query_run)) {
			$count = $query_row['count'];
			
		}
		$count_inc = $count + 1;
		$query_update = "UPDATE hit_count SET count = $count_inc";
		$query_update_run = mysqli_query($sqlconnect, $query_update);
		
	}

	
}

function add_ip()
{
	global $user_ip;
	global $sqlconnect;
	$query = "INSERT INTO hit_ip VALUES('$user_ip')";
	$query_run = mysqli_query($sqlconnect, $query);

}

	if(ip_exists()==false)
	{
		add_ip();
		add_count();
	}
	else if(ip_exists()==true)
	{
		echo 'Match found! User IP already exists. You have just made the best PHP ever. ';
	}
	
?>

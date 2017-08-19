<?php
require 'connect_DB.php';
$query = "SELECT `Reg` ,`Name` , `Final` FROM `MM102_prefinals` WHERE `NAME`='Faizan Izhar' ORDER BY id asc ";

if($query_run = mysqli_query($sqlconnect, $query)) //new
{
	echo 'Query success!'.'<br>';
}
else{
	echo 'Query Failed! ';
}
if (mysqli_num_rows($query_run)==NULL) {
	echo "NO RESULT FOUND! ";
}
else{
	while ($query_row = mysqli_fetch_assoc($query_run)) {
	$reg = $query_row['Reg'];
	$final = $query_row['Final'];
	echo $reg.' '.'Marks in final are '.$final.'<br>';
}
}

?>
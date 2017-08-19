<?php
$offset = 0;

if(isset($_POST['submit'])){
	$text = $_POST['text'];
	$search = $_POST['search'];
	$replace = $_POST['replace'];


	if (!empty($text)&&!empty($search)&&!empty($replace)) {
		while ($strpos = strpos($text, $search, $offset)) {

			$offset = $strpos + strlen($replace);
			$text = substr_replace($text, $replace, $strpos);
			echo $text;
		}
	} else{
		echo 'Please fill the fields! ';
	}
}
?>

<form action="index.php" method="POST">
	<strong>Text area:</strong><br>
	<textarea name="text" rows="6" cols="30"></textarea><br><br>
	<strong>Search for: </strong><br>
	<input type="text" name="search"><br>
	<br>
	<strong>Replace with: </strong><br>
	<input type="text" name="replace"><br>
	<br>
	<input type="submit" value="Find and Replace" name="submit">


</form>



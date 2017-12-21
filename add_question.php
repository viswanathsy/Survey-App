<?php
include_once('sessions.php');
?>
<?php
	$te = $_post['qe'];
	$query = "insert into question (text) values (".$te.")";
	$res = mysqli_query($connection,$query)
?>
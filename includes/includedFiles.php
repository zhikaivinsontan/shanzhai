<?php

#ajav request meaning
if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	
	echo "<script>console.log('came from ajax');</script>";
	include("includes/classes/album.php");
	include("includes/classes/artist.php");
	include("includes/classes/song.php");
	include("includes/config.php");

} else {
	include("includes/header.php");
	include("includes/footer.php");

	$url = $_SERVER['REQUEST_URI'];
	echo "<script>openPage('$url');</script>";
	exit();
}

?>
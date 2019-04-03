<?php
include("includes/classes/album.php");
include("includes/classes/artist.php");
include("includes/classes/song.php");
include("includes/config.php");


// session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
	echo "<script>userLoggedIn = '$userLoggedIn';</script>";
} else {
	header("Location: register.php");
}
?>

<?php header('Access-Control-Allow-Origin: *'); ?>

<!DOCTYPE html>
<html>
<head>
	<title> Welcome to shanzhaify</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/script.js"></script>
	
</head>
<body>

<script> 

</script>

	<div id="mainContainer">

		<div id="topContainer">

			<?php include("includes/navBarContainer.php")?>

			<div id="mainViewContainer">
				<div id="mainContent">
					


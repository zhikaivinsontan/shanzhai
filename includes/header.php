<?php
include("includes/classes/album.php");
include("includes/classes/artist.php");
include("includes/classes/song.php");
include("includes/config.php");


// session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
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
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>
<body>

<script> 
/*
		var audioElement = new Audio();
		audioElement.setTrack("assets/music/barney.mp3");
		const playPromise = audioElement.audio.play();

if (playPromise !== null){
    playPromise.catch(() => { audioElement.audio.play(); })
}
*/</script>

	<div id="mainContainer">

		<div id="topContainer">

			<?php include("includes/navBarContainer.php")?>

			<div id="mainViewContainer">
				<div id="mainContent">
					


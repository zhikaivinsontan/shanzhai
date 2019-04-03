<?php

include("../../config.php");

if(isset($_POST['songId'])) {
	$songId = $_POST['songId'];

	$query = mysqli_query($con,"SELECT * FROM songs WHERE id='$songId'");

	$resultArray = mysqli_fetch_array($query);

	echo json_encode($resultArray);
}

if(isset($_POST['artistId'])) {
	$artistId = $_POST['artistId'];

	$query = mysqli_query($con,"SELECT * FROM artists WHERE id='$artistId'");

	$resultArray = mysqli_fetch_array($query);

	echo json_encode($resultArray);
}

if(isset($_POST['albumId'])) {
	$albumId = $_POST['albumId'];

	$query = mysqli_query($con,"SELECT * FROM albums WHERE id='$albumId'");

	$resultArray = mysqli_fetch_array($query);

	echo json_encode($resultArray);
}

if(isset($_POST['artistIdSongs'])) {
	$artistId = $_POST['artistIdSongs'];

	$query = mysqli_query($con,"SELECT * FROM songs WHERE id='$artistId'");

	$resultArray = mysqli_fetch_array($query);

	echo json_encode($resultArray);
}



?>
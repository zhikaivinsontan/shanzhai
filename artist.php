 <?php include("includes/includedFiles.php"); ?> 


<?php
if(isset($_GET['id'])) {
	$artistId = $_GET['id'];
} else {
	header("Leader:index.php");
}

$artist = new Artist($con,$artistId);
?>


<div class="entityInfo">
	<div class=centerSection"">
		<div class="artistInfo">
			<h1 class="artistName"><?php echo "<h1>".$artist->getName()."</h1>"; ?></h1>
			<div class="headerButtons">
				<button class="button green">PLAY</button>
			</div>
		</div>
	</div>
</div>

<?php

	$songs = $artist->getSongs();
	// create a playlist of the 
	foreach($songs as $johnny) {
		$jsonArray = json_encode($songs);
		
	}

?>
<?php  
	echo "<h2>"."Most Played Songs"."</h2>";
	echo "<hr>";
	$braker = 1;

	foreach($songs as $johnny) {

		if ($braker > 5) {
			break;
		}

		$current = new Song($con,$johnny);
		// echo $current->getTitle()."<br>" ;
		echo "<li class='tracklistRow'>

			<div class='trackCount'>
				<img class='play' src='https://img.icons8.com/dotty/80/000000/play.png' onclick='setTrack(".$johnny.",tempPlaylist,true)'>


				<span class='trackNumber'>".$braker."</span>
			</div>

			<div class='trackInfo'>
				<span class='trackName1'>".$current->getTitle()."</span>
				<span class='artistName1'>".$artist->getName()."</span>
			</div>
		</li>";

		$braker += 1;

	}


	echo "<h1>"."Albums"."</h1>";

	$albums = $artist->getAlbums();
	foreach($albums as $johnny) {
		$current = new Album($con,$johnny);
		echo "<div class='gridViewItem'>
		<img src='" . $current->getArtworkPath() . "' onclick='openPage(\"album.php?id=" .$johnny.   "\")'>" .
		$current->getTitle(). 
		"</div>";
	}

?>

<script>
			var tempSongIds2 = '<?php echo json_encode($songs)?>';
			console.log(tempSongIds2);
			tempPlaylist = JSON.parse(tempSongIds2);
			console.log(tempPlaylist);
</script>













<div class="gridViewContainer">



</div>
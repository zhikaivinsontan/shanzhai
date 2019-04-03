 <?php //include("includes/header.php"); 
 include("includes/includedFiles.php"); ?> 

<?php
if(isset($_GET['id'])) {

	$albumId = $_GET['id'];
} else {
	header("Leader:index.php");
}


$album = new Album($con,$albumId);
$artist = new Artist($con,$album->getArtist());

?>


<div class="entityInfo">
	
	<div class="leftSection">
		<img src="<?php echo $album->getArtworkPath(); ?>">
	</div>

	<div class="rightSection">
		<h2><?php echo $album->getTitle(); ?></h2>
		<p>By <?php echo $artist->getName();?></p>
		<p><?php echo $album->getNumberOfSongs(); ?> songs</p>
		
	</div>

</div>

<div class="tracklistContainer">
	<ul class="tracklist">
		<?php
			$songIdArray = $album->getSongIds();
			$i = 1;
			foreach($songIdArray as $songId) {
				$albumSong = new Song($con,$songId);
				$albumArtist = $albumSong->getArtist();
				

				echo "<li class='tracklistRow'>
						<div class='trackCount'>
							<img class='play' src='https://img.icons8.com/dotty/80/000000/play.png' onclick='setTrack(".$albumSong->getId().",tempPlaylist,true)'>
							<span class='trackNumber'>".$i."</span>
						</div>
					
						<div class='trackInfo'>
							<span class='trackName'>" . $albumSong->getTitle() . "	</span>
						</div>

						<div class='trackOptions'>
							<img class='optionsButton' src='https://img.icons8.com/wired/64/000000/more.png'>
						</div>

						<div class='trackDuration'>
							<span class='durection'>" .$albumSong->getDuration() . "</span>
						</div>


					</li>";
				
				$i += 1;
			}
		?>

		<script>
	
			var tempSongIds = '<?php echo json_encode($songIdArray)?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>


	</ul>
</div>





<?php //include("includes/footer.php");?>
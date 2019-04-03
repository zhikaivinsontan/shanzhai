<?php 

include("includes/includedFiles.php");

if (isset($_GET['term'])) {
	$term = urldecode($_GET['term']);
	// echo $term;
} else {
	$term ="";
}

?>

<div class="searchContainer">
	
	<h4>Search for an artist, album or song</h4>
	<input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing" onfocus="this.value=this.value">

</div>



<script>
	
$(function() {
	var timer;
	$(".searchInput").keyup(function() {
		clearTimeout(timer);
		timer = setTimeout(function() {
			var val = $(".searchInput").val();
			console.log("search.php?term=" + val);
			openPage("search.php?term=" + val);
		
		},2000);
	})


})

</script>

<!-- artist -->
<div class="searchArtist">
	

</div>

<!-- Songs -->
<div class="searchSong">
<h2>Songs</h2>	

<?php 


if ($term != ""){ 
	$songQuery = mysqli_query($con,"SELECT id FROM songs WHERE title LIKE '$term%' LIMIT 10");

	if (mysqli_num_rows($songQuery) == 0) {
		echo "<span class='noResults'>No songs found matching".$term."</span>";
	}


	$count = 1;
	while ($row = mysqli_fetch_array($songQuery)) {
		
		
			
	}
}
 ?>



</div>

<!-- albums -->
<div class="searchAlbum">
	




</div>



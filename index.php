
<?php include("includes/header.php"); ?>

<div class="gridViewContainer">
	

<h1 class="pageHeadingBig">You Might Also Like</h1>

	<?php 
		$albumQuery = mysqli_query($con,"SELECT * FROM albums ORDER BY RAND() LIMIT 10");
		while ($row = mysqli_fetch_array($albumQuery)) {
			// echo $row['title'] . "<br>";
		

			echo "<div class='gridViewItem'>
				<a href='album.php?id=" . $row['id'] . "'>
				<img src='" . $row['artworkPath'] . "'>
				<div class='gridViewInfo'>" .$row['title'] ."</div>
				</a>
			</div>";


		}
	?>



</div>

<?php include("includes/footer.php");?>
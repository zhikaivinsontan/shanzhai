
<?php 
// include("includes/header.php"); 
include("includes/includedFiles.php"); 

?>

<div class="gridViewContainer">
	

<h1 class="pageHeadingBig">您可能喜欢</h1>

	<?php 
		$albumQuery = mysqli_query($con,"SELECT * FROM albums ORDER BY RAND() LIMIT 10");
		while ($row = mysqli_fetch_array($albumQuery)) {
			
			echo "<div class='gridViewItem'>
				<span role='link' tabindex='0' onclick='openPage(\"album.php?id=" .$row['id']. "\")'>	
				
					<img src='" . $row['artworkPath'] . "'>
				<div class='gridViewInfo'>" 
				.$row['title']."</div>
				</span>
				</div>";


		}
	?>



</div>

<?php include("includes/footer.php");?>
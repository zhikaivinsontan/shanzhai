</div>
</div>

<div id="navBarContainer">
	<nav class="navBar">
		
			<span class="logo" onclick="openPage('index.php')">
			<img src="https://img.icons8.com/wired/64/000000/mountain.png" alt="shanzhai">
			</span>

		<div class="group">
			<div class="navItem">
				<a href="search.php" class="navItemLink">Search</a>
				<img class="logo" src="https://img.icons8.com/wired/64/000000/google-web-search.png">
			</div>
		</div>

		<div class="group">
			<div class="navItem">
				<a href="search.php" class="navItemLink">Browse</a>

			</div>
			<div class="navItem">
				<a href="search.php" class="navItemLink">Your Music</a>
			</div>
			<div class="navItem">
				<a href="search.php" class="navItemLink">Reece Kenney</a>
			</div>


		</div>

	</nav>
</div>
</div>



<?php

$songQuery = mysqli_query($con,"SELECT id FROM songs ORDER BY RAND() LIMIT 10");

$resultArray = array();

while ($row = mysqli_fetch_array($songQuery)) {
	array_push($resultArray,$row['id']);
}

$jsonArray = json_encode($resultArray);

?>

<script>

	$(document).ready(function() {

		currentPlayList = <?php echo $jsonArray; ?>;

		audioElement = new Audio();
		
		setTrack(currentPlayList[currentIndex],currentPlayList,false);

		$(".playbackBar .progressBar").mousedown(function() {
			mouseDown = true;
			// console.log(this);
		});

		$(".playbackBar .progressBar").mousemove(function(e) {
			if (mouseDown == true) {
				timeFromOffset(e,this);
			}
		});

		$(".playbackBar .progressBar").mouseup(function(e) {
			timeFromOffset(e,this);
		});

		$(".volumeBar .progressBar").mousedown(function() {
			mouseDown = true;
			// console.log(this);
		});

		$(".volumeBar .progressBar").mousemove(function(e) {
			if (mouseDown == true) {
				var percentage = e.offsetX / $(this).width();
				if (percentage >= 0 && percentage <= 1) {
					audioElement.audio.volume = percentage;
				}
			}
		});

		$(".volumeBar .progressBar").mouseup(function(e) {
			// timeFromOffset(e,this);
			var percentage = e.offsetX / $(this).width();
			if (percentage >= 0 && percentage <= 1) {
				audioElement.audio.volume = percentage;
			}
		});

		$(document).mouseup(function() {
			mouseDown = false;
		});
	});

	function timeFromOffset(mouse,progressBar) {
		var percentage = mouse.offsetX / $(progressBar).width() * 100;
		var seconds = audioElement.audio.duration * (percentage / 100);
		audioElement.setTime(seconds);
	}

	function repeatSong() {
		repeat = true;
		nextSong();
	}

	function setMute() {
		audioElement.audio.muted =! audioElement.audio.muted;
	}

	function prevSong() {
		if (audioElement.audio.currentTime >= 3 || currentIndex == 0) {
			audioElement.setTime(0);
		} else {
			currentIndex--;
			var trackToPlay = currentPlayList[currentIndex];
			setTrack(trackToPlay,currentPlayList,true);

			playSong();
		}
	}

	function playSong() {

		//update the count in the database
		if (audioElement.audio.currentTime == 0) {
			$.post("includes/handlers/ajax/updatePlays.php",{ songId: audioElement.currentlyPlaying.id }, function(data) {
				
			});
		}

		$(".controlButton.play").hide();
		$(".controlButton.pause").show();
		audioElement.play();
	}




	function nextSong() {
		if (repeat == true) {
			audioElement.setTime(0);
			repeat = false;
			return;
		}

		if (currentIndex == currentPlayList.length - 1) {
			currentIndex = 0;
		} else {
			currentIndex = currentIndex + 1;
		}

		var trackToPlay = currentPlayList[currentIndex];
		setTrack(trackToPlay,currentPlayList,true);

		playSong();
		
	}


	function setTrack(trackId, newPlaylist,play) {

		$.post("includes/handlers/ajax/getSongJson.php",{ songId: trackId }, function(data) {
			//console.log(data);

			currentIndex = newPlaylist.indexOf(trackId);
			
			var track = JSON.parse(data);

			$(".trackName span").text(track.title);

			
			$.post("includes/handlers/ajax/getSongJson.php",{ artistId: track.artist }, function(data) {
				var artist = JSON.parse(data);
				
				//console.log(artist);

				$(".artistName span").text( artist.name );

			});

			
			$.post("includes/handlers/ajax/getSongJson.php",{ albumId: track.album }, function(data) {
				var album = JSON.parse(data);
				// console.log(album.artworkPath);

				$(".albumLink img").attr("src",album.artworkPath );

			});

			audioElement.setTrack(track);
		});
	}

	function pauseSong() {
		$(".controlButton.pause").hide();
		$(".controlButton.play").show();
		audioElement.pause();
	}

</script>






<div id="nowPlayingBarContainer">
	<div id="nowPlayingBar">
		
		<div id="nowPlayingLeft">
			<div class="content">
				<span class="albumLink">
					<img src="assets/images/profile-pics/john.png" class="albumArtwork">
				</span>

				<div class="trackInfo">
					<span class="trackName">
						<span></span>
					</span>
					<span class="artistName">
						<span></span>

					</span>
				</div>
			</div>
		</div>

		<div id="nowPlayingCenter">
			<div id="content playerControls">
				<button class="controlButton shuffle" title="Shuffle Button">
					<img src="https://img.icons8.com/wired/64/000000/shuffle.png">
				</button>
				<button class="controlButton previous" title="Previous Button" onclick="prevSong()">
					<img src="https://img.icons8.com/dotty/80/000000/back.png">
				</button>
				<button class="controlButton play" title="Play Button" onclick="playSong()">
					<img  src="https://img.icons8.com/dotty/80/000000/play.png" alt="Play">
				</button>
				<button class="controlButton pause" title="Pause Button" onclick="pauseSong()" hidden="hidden">
					<img src="https://img.icons8.com/wired/64/000000/pause.png" alt="Pause">
				</button>
				<button class="controlButton next" title="Next Button" onclick="nextSong()">
					<img src="https://img.icons8.com/dotty/80/000000/forward.png">
				</button>
				<button class="controlButton repeat" title="Repeat Button" onclick="repeatSong()">
					<img src="https://img.icons8.com/dotty/80/000000/repeat.png">
				</button>
			</div>
			<br>
			<div class="playbackBar">
				<span class="progressTime current">0.00</span>
				<div class="progressBar">
					<div class="progressBarBg">
						<div class="progress"></div>
					</div>
				</div>
				<span class="progressTime remaining">0.00</span>
			</div>
		</div>
		<div id="nowPlayingRight">
			<div class="volumeBar">
				<button class="controlButton volume" title="Volume button" onclick="setMute()">
					<img src="https://img.icons8.com/wired/64/000000/medium-volume.png" alt="Volume">
				</button>
				<div class="progressBar">
					<div class="progressBarBg">
						<div class="progress"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>
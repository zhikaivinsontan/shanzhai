var currentPlayList = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var userLoggedIn;


function openPage(url) {

	if(url.indexOf("?") == -1) {
		url = url + "?";
	}


	var encodedUrl = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
	$('#mainContent').load(encodedUrl);
}




function formatTime(seconds) {
	var time = Math.round(seconds);
	var minutes = Math.floor(time/60);
	var seconds = time - minutes * 60

	var extraZero;

	if (seconds < 10) {
		extraZero = "0";
	} else {
		extraZero = "";
	}

	return minutes + ":" + extraZero + seconds;
}

function updateTimeProgressBar(audio) {
	$(".progressTime.current").text(formatTime(audio.currentTime));
	$(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

	var progress = audio.currentTime / audio.duration * 100;

	$(".playbackBar .progress").css("width",progress + "%");
}

function updateVolumeProgressBar(audio) {

	var volume = audio.volume * 100;
$(".volumeBar .progress").css("width",volume + "%");
}

function Audio() {
	this.currentlyPlaying;
	this.audio = document.createElement('audio');

	this.audio.addEventListener("canplay", function() {
		var duration = formatTime(this.duration);
		$(".progressTime.remaining").text(duration);
		updateVolumeProgressBar(this);
		// console.log(text(duration));
	});


	this.audio.addEventListener("timeupdate",function(){
		// console.log(formatTime(audio.currentTime));
		if(this.duration) {

			updateTimeProgressBar(this);

		}
	});

	this.audio.addEventListener("volumechange",function() {
		updateVolumeProgressBar(this);
	});



	//HERE HERE HERE HERE HERE!
	this.audio.addEventListener("ended",function(){
		// nextSong();
	});


	this.setTrack = function(track) {
		this.currentlyPlaying = track;
		this.audio.src = track.path;
	}


	this.play = function() {

console.log(currentIndex);
		
		this.audio.play();
	}

	this.pause = function() {
		this.audio.pause();
	}
	
	this.setTime = function(seconds) {
		this.audio.currentTime = seconds;
	}

}
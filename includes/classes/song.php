<?php 
	class Song {
		private $con;
		private $id;
		private $title;
		private $artistId;
		private $album;
		private $genre;
		private $duration;
		private $path;
		private $albumOrder;
		private $plays;

		public function __construct($con,$id) {
			$this->con =$con;
			$this->id = $id;
		
			$query = mysqli_query($this->con,"SELECT * FROM songs WHERE id='$this->id'");
			$song = mysqli_fetch_array($query);	

			$this->title = $song['title'];
			$this->artistId = $song['artist'];
			$this->album = $song['album'];
			$this->genre = $song['genre'];
			$this->duration = $song['duration'];
			$this->path = $song['path'];
			//$this->albumOrder = $song[''];
			//$this->plays = $song['plays'];

		}

		public function getId() {
			return $this->id;
		}

		public function getTitle() {
			return $this->title;
		}

		public function getArtist() {
			return $this->artistId;
		}

		public function getAlbum() {
			return $this->album;
		}

		public function getGenre() {
			return $this->genre;
		}

		public function getDuration() {
			return $this->duration;
		}

		public function getPath() {
			return $this->path;
		}



	}



?>
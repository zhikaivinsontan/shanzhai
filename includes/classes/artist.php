<?php 
	class Artist {
		private $con;
		private $id;

		public function __construct($con,$id) {
			$this->con =$con;
			$this->id = $id;
		}

		public function getName() {
			$artistQuery = mysqli_query($this->con,"SELECT * FROM artists WHERE id='$this->id'");
			$artist = mysqli_fetch_array($artistQuery);
			return $artist['name'];
		}

		public function getSongs() {

			$songQuery = mysqli_query($this->con,"SELECT * FROM songs WHERE artist='$this->id' ORDER BY plays ASC");
			
			$john = array();
			while ($row = mysqli_fetch_array($songQuery)) {
				array_push($john,$row['id']);
			}
			
			return $john;
		}

		public function getAlbums() {
			$songQuery = mysqli_query($this->con,"SELECT * FROM albums WHERE artist='$this->id'");

			$john = array();
			while ($row = mysqli_fetch_array($songQuery)) {
				array_push($john,$row['id']);
			}
			
			return $john;
		}



	}




?>
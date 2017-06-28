<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/Connect.php";
	
	//function for generating imputs for video url
	function create_playlist() {	
		global $db;
		if(!empty($_POST['name']) AND (!empty($_POST['genre']) AND (!empty($_POST['number_songs']) AND (isset($_POST['submit_add']))))) {
			$name = $_POST['name'];
			$genre = $_POST['genre'];
			$number = $_POST['number_songs'];
			$autor = $_SESSION['username'];
			

			$insert = $db->prepare("INSERT INTO playlist (id,autor,name,genre,number_songs,songs) VALUES ('', :autor, :name, :genre, :number_songs,'')");
			$insert->bindParam(':autor', $autor);
			$insert->bindParam(':name', $name);
			$insert->bindParam(':genre', $genre);
			$insert->bindParam(':number_songs', $number);
			$insert->execute();
			echo "Playlist was added";
			
			for ($i = 1; $i <= $number; $i++) {
				echo "<input type='text' class='form-control input-lg' placeholder='URL of video' name='url" . $i . "'/>";
				echo "<br>";
				
			}
			echo "<input type='hidden' value='$number' name='count'/>";;
		}
		 else {
			  echo "Fill all fields";
		  }		
	}
	
	// function for registration
	function registration() {
		global $db;
		if (isset($_POST['submit']) AND !empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password2'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$date = date("Y-m-d");
		$pass = hash('sha256',$password);
		if ($password == $password2) {
			$vyber = $db->prepare("SELECT * FROM users WHERE username= :username");
            $vyber->execute(array(":username"=>$username));      
            $count = $vyber->rowCount();
			if($count == 0) {
				$sql = $db->prepare("INSERT INTO users(id, username, email, password, date, level) VALUES ('', :username, :email, :password, :date, 'User')");
						$sql->bindParam(':username', $_POST['username']);
						$sql->bindParam(':email', $_POST['email']);
						$sql->bindParam(':password', $pass);
						$sql->bindParam(':date', $date);
						$sql->execute();
						echo "<div class='echos' style='text-align:center;'>";
						echo "Registration completed!" . "<br>";
						echo "<a href='http://jezecek.nostools.cz/include/login.php'>Login</a>";		
			}
			else {
				echo "Username already taken!" ."<br>";
				echo "<a href='http://jezecek.nostools.cz/include/registration.php'>Try again</a>";
			}
		}
		else {
			echo "Passwords dont match!" . "<br>";
			echo "<a href='http://jezecek.nostools.cz/include/registration.php'>Try again</a>";
			}
		}
		else {
		echo "Fill every field." . "<br>";
		echo "<a href='http://jezecek.nostools.cz/include/registration.php'>Try again</a>";
		}	
		echo "</div>";
	}

	//function for login	
	function login() {
		global $db;
		if (isset($_POST['submit']) AND (!empty($_POST['name']) AND (!empty($_POST['password'])))) {
			$username = $_POST['name'];
			$password = $_POST['password'];
			$pass = hash('sha256',$password);
			
			$sql = $db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
			$sql->bindParam(':username', $username);
			$sql->bindParam(':password', $pass);
			$sql->execute();
			$result = $sql->fetchAll();
			
			foreach ($result as $data) {
				if ($username == $data['username'] AND $pass == $data['password']) {
					$_SESSION['username'] = $username;
					$_SESSION['id'] = $data['id'];
                    $_SESSION['loggedin'] = true;
					echo "<div class='echos' style='text-align:center;'>";
					echo "Login successful" . "<br>";
					echo "<a href='http://jezecek.nostools.cz/'>Homepage</a>";
				} 
				else {
					echo "Wrong username or password!" . "<br>";
					echo "<a href='http://jezecek.nostools.cz/include/login.php'>Try again</a>";
				}
			}
		} 
		else {
			  echo "Fill all fields!" . "<br>";
			  echo "<a href='http://jezecek.nostools.cz/include/login.php'>Try again</a>";
		}
		echo "</div>";
	}
	
	//function for searching artists
	function search() {
		global $db;
		if(isset($_POST['submit']) AND !empty($_POST['search'])) {
			$search = $_POST['search'];
			
			$select2 = $db->prepare("SELECT * FROM artists WHERE name = :search");
			$select2->bindParam(':search', $search);
			$select2->execute();		
			$result = $select2->fetchAll();
			if ($select2)
			{
				echo "<div class='echos' style='text-align:center;'>";
				foreach($result as $data) {
					echo "cc: " . $data['name'];
				}
			}
			else {
				echo "No such artist in our database.";
			} 			
		}
		else {
			echo "Fill the search field.";
			echo "<br>";
			echo "<a href='http://jezecek.nostools.cz/include/search.php'>Try again</a>";
		}
		echo "</div>";
	}

	//function for getting videos id	
	function get_video_id() {
		global $db;
		if(isset($_GET['count'])) {
		//$url = $_POST['url0'];
			for($i = 1; $i <= $_GET['count']; $i++) {
				parse_str( parse_url( $_GET['url' . $i], PHP_URL_QUERY ), $my_array_of_vars);
				echo $my_array_of_vars['v'] . "<br>";
			}
		}
		else {
			echo "Fill all fields." . "<br>";
		}	
	}
	
	//function to get file duration
	function get_duration() {
        
		$mp3file = new MP3File("/data/web/virtuals/141246/virtual/www/subdom/jezecek/music/gg.mp3");
		$duration1 = $mp3file->getDurationEstimate();//(faster) for CBR only
		$duration2 = $mp3file->getDuration();//(slower) for VBR (or CBR)
		echo "duration: $duration1 seconds"."\n";
		echo MP3File::formatTime($duration2)."\n";
	
		$mp3file = new MP3File("/data/web/virtuals/141246/virtual/www/subdom/jezecek/music/cc.mp3");
		$duration1 = $mp3file->getDurationEstimate();//(faster) for CBR only
		$duration2 = $mp3file->getDuration();//(slower) for VBR (or CBR)
		echo "duration: $duration1 seconds"."\n";
		echo MP3File::formatTime($duration2)."\n";
	
	}
  
  function checkUserLogged() {
    global $db;
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      echo "<ul class='nav navbar-nav navbar-right'>
      <li style='color:white';> You are logged as:" . $_SESSION['username'] . "</li>
      <li><a href='http://jezecek.nostools.cz/php/logout.php'><span class='glyphicon glyphicon-user'></span> Logout</a></li>
      </ul>" ;
    }
    else {
        echo "<ul class='nav navbar-nav navbar-right'>
      <li><a href='http://jezecek.nostools.cz/include/registration.php'><span class='glyphicon glyphicon-user'></span> Registration</a></li>
      <li><a href='http://jezecek.nostools.cz/include/login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
    </ul>";
    }
  }

  function checkUser() {
	  global $db;
    	  session_start();
          if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
		echo "You need to login to access this site.";
		echo "<a href='http://jezecek.nostools.cz/include/login.php'>Login</a>";
	}
  }
	
?>
<!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="utf-8">
          <link href="style.css" rel="stylesheet" type="text/css">
          <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
          <title>Web Application</title>
          <style>

              html {
                  height: 100%;
              }
              body {
                  margin: 0;
                  font-family: Arial, Helvetica, sans-serif;
              }

              header {
                  background-image: url("background.jpg");
                  background-size: cover;
                  height: 150vh;
                  background-position: center;
              }

              ul {
                  float: right;
                  list-style-type: none;
              }

              ul li {
                  display: inline-block;
              }

              ul li a {
                  text-decoration: none;
                  color: white;
                  padding: 5px 10px;
                  border: 1px solid transparent;
                  transition: 0.6s ease;
                  background-color: darkgray;
              }

              ul li a[id="playlist"] {
                  text-decoration: none;
                  color: white;
                  padding: 5px 10px;
                  border: 1px solid transparent;
                  transition: 0.6s ease;
                  background-color: coral;
              }

              ul li label[id="member"] {
                  text-decoration: none;
                  padding-left: 0;
                  border: 1px solid transparent;
                  transition: 0.6s ease;
                  color: red;
              }

              ul li a:hover {
                  background-color: lightcoral;
                  color: white;
              }


              .logo img {
                  float: left;
                  width: 15%;
                  height: auto;
                  margin-top: 1%;
                  margin-left: 5%;
              }

              .main {
                  min-width: 1200px;
                  margin: auto;
              }

              .title h1 {
                  padding-top: 20%;
                  font-family: font-family: 'Raleway', sans-serif;
                  color: white;
                  font-size: 450%;
                  text-align: center;
              }

              .title h2 {
                  font-family: font-family: 'Raleway', sans-serif;
                  color: white;
                  font-size: 120%;
                  text-align: center;
              }

              h3 {
                  margin-left: 25%;
                  padding: 0;
                  color: red;
              }

              p[id="notify"] {
                  margin-left: 25%;
                  padding: 0;
                  color: red;
              }

              img {
                  margin-left: 25%;
                  padding-top: 0;
                  height: 100px;
              }

              input[id="myInput"] {
                  border: 1px solid;
                  color: black;
                  width: 25%;
                  height: 40px;
                  text-align: left;
                  font-size: 20px;
                  margin-top: 20%;
                  margin-left: 0;
                  outline: none;
                  cursor: pointer;
                  -webkit-border-top-left-radius: 10px;
                  -webkit-border-bottom-left-radius: 10px;
                  -moz-border-radius-topleft: 10px;
                  -moz-border-radius-bottomleft: 10px;
                  border-top-left-radius: 10px;
                  border-bottom-left-radius: 10px;
              }

              #add {
                  border: 1px solid;
                  color: black;
                  height: 40px;
                  font-size: 20px;
                  width: 10%;
                  outline: none;
                  cursor: pointer;
                  background-color: lightcoral;
                  -webkit-border-top-right-radius: 10px;
                  -webkit-border-bottom-right-radius: 10px;
                  -moz-border-radius-topright: 10px;
                  -moz-border-radius-bottomright: 10px;
                  border-top-right-radius: 10px;
                  border-bottom-right-radius: 10px;
              }

              #add:hover {
                  background: lightgray;
              }

              label [id="message1"] {
                  color: red;
                  font-weight: bold;
                  font-size: small;
              }

              h4[id="message2"] {
                  color: gray;
                  font-weight: bold;
                  font-size: 40px;
                  margin-left: 20%;
              }

              a[id="playlists"] {
                  color: yellow;
                  margin-left: 20%;
                  font-size: 20px;
              }

              label[for="playlist"] {
                  margin-left: 20%;
                  color: lightcoral;
                  font-size: 30px;
              }

              select[id="playlistName"] {
                  margin-left: 20%;
                  width: 10%;
                  height: 10%;
                  font-size: 20px;
              }

              input[id="submit"] {
                  background-color: lightcoral;
                  margin-top: 2%;
                  margin-left: 20%;
                  border: 1px solid;
                  color: black;
                  height: 25px;
                  font-size: 15px;
                  width: 10%;
                  outline: none;
                  cursor: pointer;
                  -webkit-border-top-right-radius: 10px;
                  -webkit-border-bottom-right-radius: 10px;
                  -moz-border-radius-topright: 10px;
                  -moz-border-radius-bottomright: 10px;
                  border-top-right-radius: 10px;
                  border-bottom-right-radius: 10px;
                  -webkit-border-top-left-radius: 10px;
                  -webkit-border-bottom-left-radius: 10px;
                  -moz-border-radius-topleft: 10px;
                  -moz-border-radius-bottomleft: 10px;
                  border-top-left-radius: 10px;
                  border-bottom-left-radius: 10px;
              }

              p[id="notify"] {
                  margin-left: 20%;
                  color: #7db54a;
              }

          </style>

          <script>
              function validate() {
                  isValid = true;
                  if (document.forms["myform"]["myInput"].value.length != 0) {
                      var letters = /^[A-Za-z0-9-\s]+$/;
                      var myInput = document.forms["myform"]["myInput"].value;
                      var check = letters.test(myInput);
                      if (check == false) {
                          document.getElementById('message1').style.color = "red";
                          document.getElementById('message1').style.visibility = "visible";
                          document.getElementById('message1').innerHTML = "**only contain alphanumeric characters and spaces";
                          isValid = false;
                      } else {
                          document.getElementById('message1').style.visibility = "visible";
                          document.getElementById('message1').innerHTML = "";
                      }
                      return isValid;
                  }
              }
          </script>

      </head>
      <body>
      <header>
          <div class="main">
              <div class="logo">
                  <img src="logoMusic.jpg">
              </div>

              <?php
              session_start();
              require_once("conn.php");
              if(isset($_SESSION['username'])) {
                  $user = $_SESSION['username'];
                  $query = "select * from membership where username = '".$user."'";
                  $result = mysqli_query($dbConn,$query);
                  echo '<ul>
                             <li><a href="search.php">Home</a></li>
                             <li><a id="logout" href= "logout.php?logout">Logout</a></li>
                             <li><a href="#">Sign Up</a></li>
                             <li><a href="#">Premium</a></li>
                             <li><a href="#">Help</a></li>
                             <li><a href="#">Download</a></li>
                        </ul>';
                  while ($row=$result->fetch_assoc())
                  {

                      echo '<ul><li><a id="playlist" href= "playlist.php">Your Playlist</a></li></ul>';
                      echo '<ul><li><label id="member">' . $user . " (" . "Category:" . $row['category'] . ")" . '</label></li></ul>';

                  }
              } else {
                  echo '<ul>
                             <li><a href="search.php">Home</a></li>
                             <li><a id="login" href="login.php">Login</a></li>
                             <li><a href="#">Sign Up</a></li>
                             <li><a href="#">Premium</a></li>
                             <li><a href="#">Help</a></li>
                             <li><a href="#">Download</a></li>
                 </ul>';
              }
              ?>
          </div>

          <?php
          session_start();
          require_once("conn.php");
          echo  '<form name="myform" onsubmit="return validate()" method="post" action= "playlist.php">
          <input type="text" placeholder="Add..." id="myInput" class="myInput" name="myInput"><input type="submit" id="add" name="add" value="Add a playlist">
          <label class="message1" id="message1"></label></form>';
          if(isset($_SESSION['username']))
          {
              $user = $_SESSION['username'];
              $query = "select  playlist_name, playlist_id from memberplaylist inner join membership on membership.member_id = memberplaylist.member_id where username = '" . $user . "'";
              $result = mysqli_query($dbConn, $query);
              echo '<h4 class="message2" id="message2">Your playlists: </h4>';
              while ($row = $result->fetch_assoc())
              {
                  echo '<a id="playlists" href="play.php?playlist_name='.$row['playlist_name'].'">' . $row['playlist_name'] .'</a><br>';
              }
              $query1 = "select member_id from membership where username = '" . $user . "'";
              $result1 = mysqli_query($dbConn, $query1);
              $member_id = '';
              while ($row1 = $result1->fetch_assoc()) {
                  $member_id = $row1['member_id'];
              }
              $playlist_id = mysqli_query($dbConn, "SELECT MAX(playlist_id) FROM memberplaylist");
              $row = mysqli_fetch_array($playlist_id);
              $playlist_id = $row[0] + 1;
              if (isset($_REQUEST['add'])) {
                  if(isset($_POST['myInput']))
                  {
                      $add = $dbConn->escape_string($_POST['myInput']);
                  }
                  if(empty($add) == false)
                  {
                      $dbonn = new mysqli('localhost', "luong", "Hinhvuong1234", "247Music");
                      if($dbConn->connect_error)
                      {
                          die("Failed to connect to database " . $dbConn->connect_error);
                      }
                      $sql = "Insert into  memberplaylist(playlist_id,member_id,playlist_name) values ('$playlist_id','$member_id','$add')";
                      if ($dbConn->query($sql) === TRUE) {
                          $query2 = "select  playlist_name, playlist_id from  memberplaylist  where playlist_id = '" . $playlist_id . "'";
                          $result2 = mysqli_query($dbConn, $query2);
                          while ($row = $result2->fetch_assoc())
                          {
                              echo '<a id="playlists" href="play.php?playlist_name='.$row['playlist_name'].'">' . $row['playlist_name'] .'</a><br>';
                          }
                      } else {
                          echo "Error: " . $sql . "<br>" . $dbConn->error;
                      }
                      $dbConn->close();
                  }
              }
          }
          ?>
      <?php
      session_start();
      require_once("conn.php");
      $add = $dbConn->escape_string($_POST['myInput']);
      if(empty($add) == true) {
          $user = $_SESSION['username'];
          if (@$_GET['Song'] == true) {
              $songs = $_GET['Song'];
              $query4 = "select  playlist_name, playlist_id from memberplaylist inner join membership on membership.member_id = memberplaylist.member_id where username = '" . $user . "'";
              $result4 = mysqli_query($dbConn, $query4);
              $query5 = "select track_title from track";
              $result5 = mysqli_query($dbConn, $query5);
              echo '<form name="myform"  id="SEARCH" method="POST" action= "playlist.php?Song='.$songs.'">';
              echo '<br><br>';
              echo '<label for="playlist">Please chose a playlist:</label><br><br>';
              echo '<select id="playlistName" name="playlistName[]" size="4" multiple>';
              while ($row4 = $result4->fetch_assoc()) {
                  echo '<option value = "' . $row4['playlist_name'] . '">' . $row4['playlist_name'] . '</option>';
              }
              echo '</select><br>';
              echo '<input type="submit" id="submit" name="submit" value="Add to playlist"><br>';
              echo '</form>';

              if (isset($_POST['playlistName'])) {
                  if (isset($_REQUEST['submit'])) {
                      foreach ($_POST["playlistName"] as $playlistName) {
                      }
                      $query7 = "select track_id from track where track_title =  '" . $songs . "'";
                      $result7 = mysqli_query($dbConn, $query7);
                      $query8 = "select playlist_id from memberplaylist where playlist_name = '" . $playlistName . "'";
                      $result8 = mysqli_query($dbConn, $query8);
                      $track_id = '';
                      $playlist_id = '';
                      while ($row = $result7->fetch_assoc()) {
                          $track_id = $row['track_id'];
                      }
                      while ($row = $result8->fetch_assoc()) {
                          $playlist_id = $row['playlist_id'];
                      }
                      $id = mysqli_query($dbConn, "SELECT MAX(id) FROM playlist");
                      $row = mysqli_fetch_array($id);
                      $id = $row[0] + 1;
                      $dbConn = new mysqli('localhost', "luong", "Hinhvuong1234", "247Music");
                      if ($dbConn->connect_error) {
                          die("Failed to connect to database " . $dbConn->connect_error);
                      }
                      $sql = "Insert into  playlist(id,playlist_id,track_id) values ('$id','$playlist_id','$track_id')";
                      if ($dbConn->query($sql) === TRUE) {
                          echo '<p id="notify">' . "**New record created successfully" . '</p>';
                      } else {
                          echo "Error: " . $sql . "<br>" . $dbConn->error;
                      }
                      $dbConn->close();
                  }
              }
          }
      }
      ?>
      </header>
      </body>
      </html>



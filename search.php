<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <title>Web Application</title>
    <script type="text/javascript">
              function active() {
                  let sb = document.getElementById('searchBar');
                  if (sb.value === 'Search...') {
                      sb.value = '';
                      sb.placeholder = 'Search...'
                  }
              }

              function inactive() {
                  let sb = document.getElementById('searchBar');

                  if (sb.value === '') {
                      sb.value = 'Search...';
                      sb.placeholder = '';
                  }
              }
          </script>
          <style>
              @media screen and (min-width:1200px) {

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

                  #searchBar {
                      border: 1px solid;
                      color: black;
                      width: 40%;
                      height: 40px;
                      text-align: left;
                      font-size: 30px;
                      margin-left: 25%;
                      margin-top: 2%;
                      outline: none;
                      cursor: pointer;
                      -webkit-border-top-left-radius: 10px;
                      -webkit-border-bottom-left-radius: 10px;
                      -moz-border-radius-topleft: 10px;
                      -moz-border-radius-bottomleft: 10px;
                      border-top-left-radius: 10px;
                      border-bottom-left-radius: 10px;
                  }

                  #searchBtn {
                      border: 1px solid;
                      color: black;
                      height: 45px;
                      width: 5%;
                      font-size: 30px;
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

                  #searchBtn:hover {
                      background: lightgray;
                  }

                  h3 {
                      margin-left: 25%;
                      padding: 0;
                      color: red;
                  }

                  p {
                      margin-left: 25%;
                      padding: 0;
                      color: lawngreen;
                  }

                  img {
                      margin-left: 25%;
                      padding-top: 0;
                      height: 100px;
                  }

                  a[class="result"] {
                      color: red;
                  }

                  .listOfResults {
                      width: 60%;
                      height: 250px;
                      border: 1px dotted black;
                      overflow-y: scroll;
                      margin-left: 10%;
                  }

                  .listOfResults ::-webkit-scrollbar {
                      display: none;
                  }

                  .listOfResults {
                      -ms-overflow-style: none;
                  }
              }
          </style>
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
                             <li><a href="#">Help</a></li>
                             <li><a href="#">Download</a></li>
                        </ul>';
                      while ($row=$result->fetch_assoc())
                  {
                      echo '<ul><li><a id="playlist" href= "playlist.php">Your Playlist</a></li></ul>';
                      echo '<ul><li><label id="member">' . $user . " (" . "Category:" . $row['category'] . ")" . '</label></li></ul>';
                  }
                  echo '<div class="title"><h1>' . "Music for everyone" . '</h1><h2>' ."Millions of songs. No credit card needed" . '</h2></div>';
                  echo '<form id="search" action= "'.$_SERVER['PHP_SELF'].'" method="POST">
                            <input type="text" id= "searchBar" name = "searchBar" placeholder= "" value= "Search..." onmousedown= "active();" onblur= "inactive();"><input type= "submit" id= "searchBtn"name= "searchBtn" value= "Go!">
                        </form>';
              } else {
                  echo '<ul>
                             <li><a href="search.php">Home</a></li>
                             <li><a id="login" href="login.php">Login</a></li>
                             <li><a href="#">Sign Up</a></li>
                             <li><a href="#">Help</a></li>
                             <li><a href="#">Download</a></li>
                        </ul>';
                  echo '<div class="title"><h1>' . "Music for everyone" . '</h1><h2>' ."Millions of songs. No credit card needed" . '</h2></div>';
                  echo '<form id="search" action= "'.$_SERVER['PHP_SELF'].'" method="POST">
                            <input type= "text" id= "searchBar" name= "searchBar" placeholder= "" value= "Search..." onmousedown= "active();" onblur= "inactive();"><input type= "submit" id= "searchBtn" name= "searchBtn" value= "Go!">
                        </form>';
              }
              ?>
                  <?php
                  require_once("conn.php");
                  if(!isset($_POST['searchBar']))
                  {
                      echo ' ';
                  } else {
                  if(isset($_REQUEST['searchBtn']) && $_POST['searchBar'] !== 'Search...') {
                  $searchBar = $dbConn->escape_string($_POST['searchBar']);
                  $querySong = "Select track_title, artist_name, thumbnail from track inner join artist on track.artist_id = artist.artist_id  WHERE track_title LIKE '%$searchBar%' OR artist_name LIKE '%$searchBar%'";
                  $queryAlbum = "Select album_name, artist_name from album inner join artist on album.artist_id = artist.artist_id  WHERE album_name LIKE '%$searchBar%' OR artist_name LIKE '%$searchBar%'";
                  $resultSong = $dbConn->query($querySong);
                  $resultAlbum = $dbConn->query($queryAlbum);
                  $num_rows = mysqli_num_rows($resultSong) + mysqli_num_rows($resultAlbum);
                  if($num_rows > 1)
                  {
                     ?>
                        <p><strong><?php echo $num_rows; ?></strong> results for '<?php echo $searchBar; ?>'. Scroll down to observe all results</p>
                     <?php
                      echo '<div class="listOfResults">';
                      while ($row = $resultSong->fetch_assoc()) {
                          echo '<div class="listOfResults"><img class="image" src="logoMusic.jpg" width="106" height="106" alt="thumbnail">'.'<h3><a class="result" href="play.php?song='.$row['track_title'].'">' ."Song Title: ". $row['track_title'] . '</a></h3>'.'<p><a class="result" href="play.php?artist='.$row['artist_name'].'">' ."Artist: ". $row['artist_name'] . '</a></p>'.'</div></br>';
                      }

                      while ($row = $resultAlbum->fetch_assoc()) {
                          echo '<div class="listOfResults"><img class="image" src="logoMusic.jpg" width="106" height="106" alt="thumbnail">' . '<h3><a class="result" href="play.php?album=' . $row['album_name'] . '">' . "Album: " . $row['album_name'] . '</a></h3>' . '<p><a class="result" href="play.php?artist=' . $row['artist_name'] . '">' . "Artist: " . $row['artist_name'] . '</a></p>' . '</div></br>';
                      }
                      echo '</div>';
                  } else {
                      ?>
                      <p><strong><?php echo $num_rows; ?></strong> results for '<?php echo $searchBar; ?>'</p>
                      <?php
                  }
                  }
                  }
                  ?>
          </div>
      </header>
      </body>
      </html>

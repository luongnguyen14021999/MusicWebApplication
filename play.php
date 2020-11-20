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
                sb.placeholder = 'Search...';
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

        h4 {
            padding-left: 0;
            font-size: 30px;

        }

        iframe {
            width:500px;
            height: 600px;
        }

        div[id="Song"]  {
            margin-left: 40%;
            padding-top: 10%;
            color: red;
            width: 40%;
        }

        div[class="allAlbum"] {
            margin-left: 30%;
            padding-top: 15%;
            color: red;
        }

        img[id="album"], img[id="artist"] {
            margin-left: 0;
            width: 50%;
            height: 50%;

        }

        div[class="album"] {
            margin-left: 40%;
            padding-top: 10%;
            color: red;
            width: 40%;
        }

        a[class="result"] {
            color: red;
            margin-left: 25%;
        }

        .listOfResults {
            width: 60%;
            height: 250px;
            border: 1px dotted black;
            overflow-y: scroll;
            margin-left: 25%;
        }

        .listOfResults ::-webkit-scrollbar{
            display: none;
        }

        .listOfResults {
            -ms-overflow-style: none;
        }

        .listOfSongs {
            width: 60%;
            height: 250px;
            border: 1px dotted black;
            overflow-y: scroll;
            margin-left: 25%;
        }

        .listOfSongs ::-webkit-scrollbar{
            display: none;
        }

        .listOfSongs {
            -ms-overflow-style: none;
        }


        a[id="addToPlaylist"] {
            margin-right: 40%;
            color: red;
        }

        img {
            margin-left: 25%;
            padding-top: 0;
            height: 100px;
        }

        img[id="songs"] {
            padding-top: 10%;
            width: 30%;
            height: 10%;
            margin-left: 25%;
        }


        a[class="album"] {
            color: blue;
        }

        h5 {
            padding-top: 0;
            font-size: 45px;
            color: red;
            margin-left: 40%;
        }

        p {
            color: #7db54a;
        }

        p[id="songs"] {
            color: #7db54a;
            margin-left: 40%;
            padding-top: 0;
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
            echo       '<ul>
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

        <?php
        session_start();
        require_once("conn.php");
        if(isset($_SESSION['username'])) {
            if(@$_GET['song'] == true) {
                $song = $_GET['song'];
                $query = "select track_title, track_length, album_name, spotify_track from track inner join album on track.album_id = album.album_id WHERE track_title = '" . $song . "'";
                $result = mysqli_query($dbConn, $query);

                while ($row = $result->fetch_assoc()) {
                    echo '<div id="Song">';
                    echo '<h4>' . "Song: " . $row['track_title'] . '</h4>';
                    echo '<h4>' . "Length of song: " . $row['track_length'] . '</h4>';
                    echo '<h4>' . "Album: " . $row['album_name']. '</h4>';
                    echo '<iframe src="https://open.spotify.com/embed/track/' . $row['spotify_track'] . '"  frameborder="0" allowtransparency="true" allow="encrypted- media"></iframe><br>';
                    echo '<a id="addToPlaylist" href="playlist.php?Song='.$row['track_title'].'">Add to playlist</a>';
                    echo '</div>';
                }
            }
        } else {
            if(@$_GET['song'] == true) {
                $song = $_GET['song'];
                $query = "select track_title, track_length, album_name, spotify_track from track inner join album on track.album_id = album.album_id WHERE track_title = '" . $song . "'";
                $result = mysqli_query($dbConn, $query);


                while ($row = $result->fetch_assoc()) {
                    echo '<div id="Song">';
                    echo '<h4>' . "Song: " . $row['track_title'] . '</h4>';
                    echo '<h4>' . "Length of song: " . $row['track_length'] . '</h4>';
                    echo '<h4>' . "Album: " . $row['album_name'] . '</h4>';
                    echo '<iframe src="https://open.spotify.com/embed/track/' . $row['spotify_track'] . '" frameborder="0" allowtransparency="true" allow="encrypted- media"></iframe>';
                    echo '</div>';
                }
            }
        }
        ?>

        <?php
        require_once("conn.php");
        if(@$_GET['album'] == true)
        {
            $album = $_GET['album'];
            $query0 = "select album_name, artist_name from album inner join artist on album.artist_id = artist.artist_id WHERE album_name = '" . $album . "'";
            $query1 = "select album_name, artist_name , track_title from album inner join artist on album.artist_id = artist.artist_id inner join track on track.artist_id = album.artist_id WHERE album_name = '" . $album . "'";
            $query2 = "select thumbnail from album where album_name = '" . $album . "'";
            $result0 = mysqli_query($dbConn, $query0);
            $result1 = mysqli_query($dbConn, $query1);
            $result2 = mysqli_query($dbConn,$query2);
            echo '<div class="album">';
            while ($row = $result2->fetch_assoc()) {
                echo '<img id="album" src="logoMusic.jpg"  alt="thumbnail">';
            }
            while ($row = $result0->fetch_assoc()) {
                echo '<h4>'. "Album: " . $row['album_name'] . '</h4>';
                echo '<h4>'. "Artist: " . $row['artist_name'] . '</h4>';
                echo '<h4>'. "Songs: " . '</h4>';
                echo '<p>'. "Scroll down to observe all songs". '</p><br><br>';
            }
            echo '</div>';
            echo '<div class="listOfResults">';
            while ($row = $result1->fetch_assoc()) {
                echo '<img src="logoMusic.jpg" width="106" height="106" alt="thumbnail">' . "<br>";
                echo  '<a class="result" href="play.php?song='.$row['track_title'].'">' . $row['track_title'] . '</a>' . "<br><br><br><br>";
            }
            echo '</div>';
        }
        ?>

        <?php
        require_once("conn.php");
        if(@$_GET['artist'] == true) {
            $artist = $_GET['artist'];
            $query0 = "select artist_name, thumbnail from artist WHERE artist_name = '" . $artist . "'";
            $query1 = "select album_name, album_date , artist_name from album inner join artist on album.artist_id = artist.artist_id  WHERE artist_name = '" . $artist . "'";
            $result0 = mysqli_query($dbConn, $query0);
            $result1 = mysqli_query($dbConn, $query1);
            echo '<div class="allAlbum">';
            while ($row = $result0->fetch_assoc()) {
                echo '<img id="artist" src="logoMusic.jpg" alt="thumbnail">';
                echo '<h4>'. "Artist: " . $row['artist_name'] . '</h4>';
            }
            while ($row = $result1->fetch_assoc()) {
                echo '<h4>'. "Album: ". '<a class="album" href="play.php?album=' . $row['album_name'] . '">' . $row['album_name'] . " : " . $row['album_date'] . '</a>' . '</h4>';
            }
            echo '</div>';
        }
        ?>

        <?php
        require_once("conn.php");
        if(@$_GET['playlist_name'] == true)
        {
            $playlistName = $_GET['playlist_name'];
            $query = "select track_title from playlist inner join track on track.track_id = playlist.track_id inner join memberplaylist on playlist.playlist_id = memberplaylist.playlist_id  where playlist_name = '".$playlistName . "'";
            $result = mysqli_query($dbConn,$query) or die(mysqli_error($dbConn));
            echo '<img id="songs" src="logoMusic.jpg" alt="image" height="150px">'. '<br>';
            echo '<h5>'."Playlist: ".$playlistName .'</h5>';
            $num_rows = mysqli_num_rows($result);
            if($num_rows > 1) {
                echo '<p id="songs">Scroll down to observe all songs of playlist</p><br>';
            } else {
                echo '';
            }
            echo '<div class="listOfSongs">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<img src="logoMusic.jpg" alt="image" height="100px">' . "<br>";
                echo '<a class="result" href="play.php?song=' . $row['track_title'] . '">' . $row['track_title'] . '</a>' . "<br><br><br>";
            }
            echo '</div>';
        }
        ?>
    </div>
</header>
</body>
</html>






<?php
session_start();
?>
<?php
require_once("conn.php");
if(isset($_POST['Login']))
{
    if(empty($_POST['username']) || empty($_POST['password']))
    {
        header("location: login.php?Empty= **Please fill in the Blanks");
    } else {
        $password = $_POST['password'];
        $username = $_POST['username'];
        $password = hash("sha256", $password);
        $query = "select * from membership where username = '".$username."' and password = '".$password."'";
        $result = mysqli_query($dbConn,$query);
        if(mysqli_fetch_assoc($result))
        {
            if(isset($_POST['username']) && isset($_POST['password']))
            {
                $_SESSION['username'] = $_POST['username'];
                header("location: search.php");
            }
        }
        else {
            header("location: login.php?Invalid= **Please enter correct password and username");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href = "style.css" rel = "stylesheet" type = "text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <title>Web Application</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: url("background.jpg");
            background-size: cover;
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
            padding: 5px 20px;
            border: 1px solid transparent;
            transition: 0.6s ease;
        }

        ul li a:hover {
            background-color: gray;
            color: white;
        }

        .logo img {
            float: left;
            width: 15%;
            height: auto;
            margin-top: 1%;
            margin-left: 5%;
        }

        .login-box {
            width: 50%;
            height: 80%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background: lightgray;
            text-align: center;
        }

        .login-box h1 {
            color: black;
            text-transform: uppercase;
            font-size: 500%;
            text-align: center;
            font-family: font-family: 'Raleway', sans-serif;
        }

        .login-box input[type="text"], .login-box input[type="password"] {
            border: 0;
            display: block;
            margin: 8% auto;
            text-align: left;
            border: 2px solid cornflowerblue;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            height: 40px;
            width: 50%;
            font-size: 30px;
            color: black;
        }

        .login-box input[type="text"]:focus, .login-box input[type="password"]:focus {
            width: 80%;
            border-color: cornflowerblue;
        }

        .login-box button {
            border: 0;
            display: block;
            margin: 8% auto;
            text-align: center;
            border: 2px solid cornflowerblue;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            height: 40px;
            width: 20%;
            font-size: 30px;
        }

        .login-box button:hover {
            background: lightcoral;
        }

        .alert {
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>
<div class="mainLogin">

    <div class="logo">
        <img src="logoMusic.jpg">
    </div>

    <ul>
        <li><a href="search.php">Home</a></li>
        <li><a href="#">Sign Up</a></li>
        <li><a href="#">Premium</a></li>
        <li><a href="#">Help</a></li>
        <li><a href="#">Download</a></li>
    </ul>
</div>
<form id="login" action="login.php" method="post">
    <div class="login-box">

        <h1>Login</h1>

        <?php
        if(@$_GET['Empty'] == true)
        {
            ?>
            <div class="alert"><?php echo $_GET['Empty'] ?></div>
            <?php
        }

        ?>

        <?php
        if(@$_GET['Invalid'] == true)
        {
            ?>
            <div class="alert"><?php echo $_GET['Invalid'] ?></div>
            <?php
        }
        ?>


        <div class="textbox">
            <input type="text" placeholder="Username" id="username" name="username">
        </div>

        <div class="textbox">
            <input type="password" placeholder="Password" id="password" name="password">
        </div>

        <button class="btn" name="Login" onclick="Check()">Sign in</button>
    </div>
</form>
</body>
</html>



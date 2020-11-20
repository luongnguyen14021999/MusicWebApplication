<?php
$dbConn = new mysqli('localhost', "luong", "Hinhvuong1234", "247Music");
if($dbConn->connect_error) {
    die("Failed to connect to database " . $dbConn->connect_error);
}
?>

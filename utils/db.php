<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "73029228ai";
$dbname = "bookie_db";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$con) {
    die("Failed to connect to database");
}

?>
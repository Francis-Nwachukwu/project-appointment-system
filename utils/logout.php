<?php

session_start();

if(isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
}

header("Location: ../home/home.php");
die
?>
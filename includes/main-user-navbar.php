<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <style>
        .userInfo {
            display: flex;
            justify-content: start;
        }
        .userInfo_icon {
            margin-right: 5px;
            font-size: 1.7em;
        }
    </style>
</head>
<body>

<?php

    // include_once("../utils/db.php");

    // include_once('../utils/functions.php');


    // $user_data = check_login($con);
?>
    <nav class="navbar bg-light">
      <div class="container-fluid">
        <a href="../../index/index.php" class="navbar-brand">Appointment Scheduling</a>
        <div class="nav-userInfo">
            <div class="userInfo">
                <i class="fas fa-user userInfo_icon"></i>
                <h4>Hi, username</h4> 

                <!-- <?php echo $user_data["firstname"] ?> -->
                
            </div>
        </div>
        <div>
            <span>Logout</span>
        </div>
      </div>
    </nav>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php

    session_start();

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "73029228ai";
    $dbname = "bookie_db";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(!$con) {
        die("Failed to connect to database");
    }

   function check_student_login($con) {
        if(isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $queryStudent = "SELECT * FROM STUDENTS WHERE student_id = '$id' limit 1";

            $studentResult = mysqli_query($con, $queryStudent);
            if($studentResult && mysqli_num_rows($studentResult) > 0) {
                $student_data = mysqli_fetch_assoc($studentResult);
                return $student_data;
            }
        } 
        // redirect to login page
        header("Location: ../../index/index.php");
        die;
    }
    function check_supervisor_login($con) {
        if(isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $querySupervisor = "SELECT * FROM SUPERVISORS WHERE supervisor_id = '$id' limit 1";

            $supervisorResult = mysqli_query($con, $querySupervisor);
            if($supervisorResult && mysqli_num_rows($supervisorResult) > 0) {
                $supervisor_data = mysqli_fetch_assoc($supervisorResult);
                return $supervisor_data;
            } 
        } 
        // redirect to login page
        header("Location: ../../index/index.php");
        die;
    }

    $student_data = check_student_login($con);
    $supervisor_data = check_supervisor_login($con);
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .userInfo {
            display: flex;
            justify-content: start;
        }
        .userInfo_icon {
            margin-right: 5px;
            font-size: 1.7em;
        }
        .logout {
            text-decoration: none;
            color: red;
        }
        .logout:hover {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <nav class="navbar bg-light">
      <div class="container-fluid">
       <a href="../../index/index.php" class="navbar-brand"><span class="navbar-brand-2">Book</span>ie</a>
        <div class="nav-userInfo">
            <div class="userInfo">
                <i class="fas fa-user userInfo_icon"></i>
                <?php if(isset($student_data)) { ?>
                    <h4>Hi, <?php echo $student_data["firstname"]; ?></h4>
                <?php } ?>
                <?php if(isset($supervisor_data)) { ?>
                    <h4>Hi, <?php echo $supervisor_data["firstname"]; ?></h4>
                <?php } ?>
            </div>
        </div>
        <div>
            <a class="logout" href="/utils/logout.php">Logout</a>
        </div>
      </div>
    </nav>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
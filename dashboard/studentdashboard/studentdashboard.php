<?php
// session_start();

  include("../../utils/db.php");
  include("../../utils/functions.php");

  $user_data = check_login($con);

// echo $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../fontawesome-free-5.12.1-web/css/all.min.css"/>
    <link rel="stylesheet" href="./studentdashboard.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <title>Student Dashboard</title>
</head>
<body>
    <nav class="navbar bg-light">
      <div class="container-fluid">
        <a href="../../home/home.php" class="navbar-brand">Appointment Scheduling</a>
        <div class="nav-userInfo">
            <div class="userInfo">
                <i class="fas fa-user userInfo_icon"></i>
                <h4>Hi, <?php echo $user_data["firstname"]; ?></h4>
            </div>
        </div>
        <div>
            <a href="../../utils/logout.php">Logout</a>
        </div>
      </div>
    </nav>
    <div class="dashboard">
        <aside class="dashboard-sidebar">
            <div class="student-profile">
                <h1 class="profile-header">Profile</h1>
                <div class="profile-img_container">
                    <?php
                     $img_url = $user_data["userImage"];
                    ?>
                    <img 
                    src="../../uploads/<?=$img_url?>"
                    alt="Student profile image">
                    
                </div>
                <div class="student-details">
                    <div class="student-id">
                        <span class="id-label">Student ID</span> <?php echo $user_data["student_id"]; ?>
                    </div>
                    <div class="student-name">
                        <span class="name-label">Student Name</span> 
                        <?php 
                        $name = $user_data["firstname"] . " " . $user_data["lastname"]; 
                        echo $name;
                        ?>
                    </div>
                    <div class="student-email">
                        <span class="email-label">Student Email</span> <?php echo $user_data["email"]; ?>
                    </div>
                </div>
            </div>
        </aside>
        <section class="dashboard-main">
            <nav class="dashboard-main_nav">
                <div class="main-nav_header">
                    <!-- <i class="fas fa-arrow-left"></i> -->
                    <i class="fas fa-bars dashboard-menu"></i>
                    <h4 class="page-header">Student Dashboard</h4>
                </div>
                <div class="main-nav_tools">
                    <i class="fas fa-bell"></i>
                    
                </div>
            </nav>
            <div class="dashboard-main_content">
                <div class="container">
                    <div class="row">
                        <h1>Other content</h1>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
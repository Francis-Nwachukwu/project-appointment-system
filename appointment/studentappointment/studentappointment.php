<?php
// session_start();

  include("../../utils/db.php");
  include("../../utils/functions.php");

  $student_data = check_student_login($con);

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
    <link rel="stylesheet" href="./studentappointment.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <title>Create an Appointment</title>
</head>
<body>
    <nav class="navbar bg-light">
      <div class="container-fluid">
        <a href="../../home/home.php" class="navbar-brand">Appointment Scheduling</a>
        <div class="nav-userInfo">
            <div class="userInfo">
                <i class="fas fa-user userInfo_icon"></i>
                <h4>Hi, <?php echo $student_data["firstname"] ?></h4> 
            </div>
        </div>
        <div>
            <a class="logout" href="../../utils/logout.php">Logout</a>
        </div>
      </div>
    </nav>

    <div class="appointment">
        <aside class="appointment-sidebar">
            <div class="sidebar-list_container">
                <ul class="sidebar-list">
                    <li class="sidebar-list_item">
                        <a href="../../dashboard/studentdashboard/studentdashboard.php">
                            <div>
                                <i class="fas fa-chart-line"></i>Dashboard
                            </div>
                        </a>
                    </li>
                    <li class="sidebar-list_item active">
                        <a href="./studentappointment.php">
                            <div>
                                <i class="fas fa-calendar-check"></i>Appointment
                            </div>
                        </a>
                    </li>
                    <li class="sidebar-list_item">
                        <a href="./studentappointment.php">
                            <div>
                                <i class="fas fa-search"></i>Search
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <aside class="mobile_sidebar hidden">
            <i  class="fas fa-times close_btn"></i>
            <div class="mobile-sidebar-list_container">
                <div class="student-profile">
                    <h1 class="profile-header">Profile</h1>
                <div class="profile-img_container">
                    <?php
                     $img_url = $student_data["userImage"];
                    ?>
                    <img 
                    src="../../uploads/<?=$img_url?>"
                    alt="Student profile image">
                    
                </div>
                <div class="student-details">
                    <div class="student-id">
                        <span class="id-label">Student ID</span> <?php echo $student_data["student_id"]; ?>
                    </div>
                    <div class="student-name">
                        <span class="name-label">Student Name</span> 
                        <?php 
                        $name = $student_data["firstname"] . " " . $student_data["lastname"]; 
                        echo $name;
                        ?>
                    </div>
                    <div class="student-email">
                        <span class="email-label">Student Email</span> <?php echo $student_data["email"]; ?>
                    </div>
                </div>
            </div>
            </div>
        </aside>
         <section class="main-section">
            <nav class="dashboard-main_nav">
                <div class="main-nav_header">
                    <!-- <i class="fas fa-arrow-left"></i> -->
                    <i class="fas fa-bars dashboard_menu"></i>
                    <h4 class="page-header">Book Appointment</h4>
                </div>
                <div class="main-nav_tools">
                    <i class="fas fa-bell"></i>
                </div>
            </nav>
            
            <div class="card-container">
                <div class="card">  
                    <div class="card-body">
                        <form class="book-appointment" method="POST" action="../../utils/appointment.php">
                            <h5 class="form-header">Book an Appointment</h5>
                            <div class="card_form-detail">
                                <label>Choose Appoinment Date</label>
                                <input type="date" name="appointment-date" required/>
                            </div>
                            <div class="card_form-detail">
                                <label>Choose Appoinment Time</label>
                                <input type="time" name="appointment-time" required />
                            </div>
                            <div class="card_form-detail">
                                <label>Send a message to supervisor</label>
                                <textarea name="student-message" rows="4" cols="50" required></textarea>
                            </div>
                            <button type="submit" name="submit">Book now</button>
                        </form>
                         <?php
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    
                    if (strpos($fullUrl, "error=wronginput") == true) {
                        echo "<div class='alert'>Something went wrong</div>";
                        exit();
                    } elseif (strpos($fullUrl, "student=exists") == true) {
                        echo "<div class='alert'>Student has created an appointment already.</div>";
                        exit();
                    } 
                ?> 
                    </div>
                   
                </div>
                
            </div>
        </section>
    </div>
   

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="./studentappointment.js"></script>
</body>
</html>
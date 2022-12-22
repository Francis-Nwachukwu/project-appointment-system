<?php
// session_start();

  include("../../utils/db.php");
  include("../../utils/functions.php");

  $student_data = check_student_login($con);

  $appointment_data = getStudentAppointment($con);

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
        <a href="../../index/index.php" class="navbar-brand"><span class="navbar-brand-2">Book</span>ie</a>
        <div class="nav-userInfo">
            <div class="userInfo">
                <i class="fas fa-user userInfo_icon"></i>
                <h4>Hi, <?php echo $student_data["firstname"]; ?></h4>
            </div>
        </div>
        <div>
            <a class="logout" href="../../utils/logout.php">Logout</a>
        </div>
      </div>
    </nav>
    <div class="dashboard">
        <aside class="dashboard-sidebar">
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
        </aside>
        <aside class="mobile_sidebar hidden">
            
            <div class="mobile-sidebar-list_container">
                <div class="student-profile">
                    <div class="profile-header_container">
                        <h1 class="profile-header">Profile</h1>
                        <i  class="fas fa-times close_btn"></i>
                    </div>
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
        <section class="dashboard-main">
            <nav class="dashboard-main_nav">
                <div class="main-nav_header">
                    <i class="fas fa-bars dashboard_menu"></i>
                    <h4 class="page-header">Student Dashboard</h4>
                </div>
                <div class="main-nav_tools">
                    <i class="fas fa-bell"></i>
                    
                </div>
            </nav>
            <div class="dashboard-main_content">
                <div class="book-link_container">
                    <i class="fas fa-plus"></i>
                    <a class="book-link" href="../../appointment/studentappointment/studentappointment.php">Book an appointment</a>
                </div>
                <div class="appointment">
                    <div class="appointment-list">

                        <?php if(isset($appointment_data)) { ?>
                            <div class="card text-center">
                            <div class="card-header">Appoinment</div>
                            <?php
                                $status = $appointment_data['appointmentStatus'];
                                if($status == "Pending") {
                                    $status = "primary";
                                } elseif ($status == "Approved") {
                                    $status = "success";
                                } else {
                                    $status = "danger";
                                }
                            ?>

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $appointment_data['studentID'] ?></h5>
                                <p class="card-text"><?php echo $appointment_data['studentMessage'] ?></p>
                                <button type="disabled" href="#" class="btn btn-<?=$status?>"><?php echo $appointment_data['appointmentStatus'] ?></button>
                            </div>
                            <div class="card-footer text-muted">
                                Appointment Date:
                                <?php echo $appointment_data['appointmentDate'] ?>
                                <?php echo $appointment_data['appointmentTime'] ?>
                            </div>
                        </div>

                        <?php 
                        } else { 
                        ?>
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <i class="fas fa-stop"></i>
                                <div>
                                    No Scheduled Appointments yet
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- <footer>
        <?php
            include("../../footer/footer.php");
        ?>
    </footer> -->
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="./studentdashboard.js"></script>
</body>
</html>
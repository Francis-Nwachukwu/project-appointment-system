<?php
// session_start();

  include("../../utils/db.php");
  include("../../utils/functions.php");

  $supervisor_data = check_supervisor_login($con);

  $numPendingResult = getPendingAppointmentNum($con);
  $numApprovedResult = getApprovedAppointmentNum($con);
  $numCancelledResult = getCancelledAppointmentNum($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../fontawesome-free-5.12.1-web/css/all.min.css"/>
    <link rel="stylesheet" href="./cancelledappointment.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <title>Supervisor Dashboard</title>
</head>
<body>
    <nav class="navbar bg-light">
      <div class="container-fluid">
        <a href="../../index/index.php" class="navbar-brand"><span class="navbar-brand-2">Book</span>ie</a>
        <div class="nav-userInfo">
            <div class="userInfo">
                <i class="fas fa-user userInfo_icon"></i>
                <h4>Hi, <?php echo $supervisor_data["firstname"] ?></h4>
            </div>
        </div>
        <div>
            <a class="logout" href="../../utils/logout.php">Logout</a>
        </div>
      </div>
    </nav>

    <div class="dashboard">
        <aside class="dashboard-sidebar">
            <div class="sidebar-list_container">
                <ul class="sidebar-list">
                    <li class="sidebar-list_item active">
                        <a href="../../dashboard/supervisordashboard/supervisordashboard.php">
                            <div>
                                <i class="fas fa-chart-line"></i>Dashboard
                            </div>
                        </a>
                    </li>
                    <li class="sidebar-list_item">
                        <a href="../../dashboard/supervisordashboard/supervisordashboard.php">
                            <div>
                                <i class="fas fa-calendar-check"></i>Appointment
                            </div>
                        </a>
                    </li>
                    <li class="sidebar-list_item">
                        <a href="#">
                            <div>
                                <i class="fas fa-search"></i>Search
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="student-profile">
                <div class="profile-img_container">
                    <?php
                     $img_url = $supervisor_data["supervisorImage"];
                    ?>
                    <img 
                    src="../../uploads/<?=$img_url?>"
                    alt="Student profile image">
                    
                </div>
                <div class="student-details">
                    <div class="student-id">
                        <span class="id-label">Supervisor ID</span> <?php echo $supervisor_data["supervisor_id"]; ?>
                    </div>
                    <div class="student-name">
                        <span class="name-label">Supervisor Name</span> 
                        <?php 
                        $name = $supervisor_data["firstname"] . " " . $supervisor_data["lastname"]; 
                        echo $name;
                        ?>
                    </div>
                    <div class="student-email">
                        <span class="email-label">Supervisor Email</span> <?php echo $supervisor_data["email"]; ?>
                    </div>
                </div>
            </div>
            </div>
        </aside>
        <aside class="mobile_sidebar hidden">
            <i  class="fas fa-times close_btn"></i>
            <div class="mobile-sidebar-list_container">
                <ul class="sidebar-list">
                    <li class="sidebar-list_item active">
                        <a href="../../dashboard/supervisordashboard/supervisordashboard.php">
                            <div>
                                <i class="fas fa-chart-line"></i>Dashboard
                            </div>
                        </a>
                    </li>
                    <li class="sidebar-list_item">
                        <a href="../../dashboard/supervisordashboard/supervisordashboard.php">
                            <div>
                                <i class="fas fa-calendar-check"></i>Appointment
                            </div>
                        </a>
                    </li>
                    <li class="sidebar-list_item">
                        <a href="#">
                            <div>
                                <i class="fas fa-search"></i>Search
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="student-profile">
                <div class="profile-img_container">
                    <?php
                     $img_url = $supervisor_data["supervisorImage"];
                    ?>
                    <img 
                    src="../../uploads/<?=$img_url?>"
                    alt="Student profile image">
                    
                </div>
                <div class="student-details">
                    <div class="student-id">
                        <span class="id-label">Supervisor ID</span> <?php echo $supervisor_data["supervisor_id"]; ?>
                    </div>
                    <div class="student-name">
                        <span class="name-label">Supervisor Name</span> 
                        <?php 
                        $name = $supervisor_data["firstname"] . " " . $supervisor_data["lastname"]; 
                        echo $name;
                        ?>
                    </div>
                    <div class="student-email">
                        <span class="email-label">Supervisor Email</span> <?php echo $supervisor_data["email"]; ?>
                    </div>
                </div>
            </div>
            </div>
        </aside>
        <section class="dashboard-main">
            <nav class="dashboard-main_nav">
                <div class="main-nav_header">
                    <!-- <i class="fas fa-arrow-left"></i> -->
                    <i class="fas fa-bars dashboard_menu"></i>
                    <h4 class="page-header">Supervisor Dashboard</h4>
                </div>
                <div class="main-nav_tools">
                    <i class="fas fa-bell"></i>
                    
                </div>
            </nav>
            <div class="dashboard-main_content">
                <h2>Cancelled Appointments</h2>
                <div class="table-container">
                    <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Student ID</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Student Message</th>
                        <th>Status</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM Appointments WHERE appointmentStatus = 'Cancelled'";
                        $res = mysqli_query($con, $sql);

                        if(mysqli_num_rows($res) > 0) {
                            while ($result = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <td><?=$result['id']?></td>
                            <td><?=$result['studentID']?></td>
                            <td><?=$result['appointmentDate']?></td>
                            <td><?=$result['appointmentTime']?></td>
                            <td><?=$result['studentMessage']?></td>
                            <td><button class="btn btn-danger" type="disabled">Cancelled</button></td>
                        </tr>
                    <?php } } ?>
                </table>
                </div>
        </section>
    </div>
    <script src="./cancelledappointment.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
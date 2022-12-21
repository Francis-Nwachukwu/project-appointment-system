<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../fontawesome-free-5.12.1-web/css/all.min.css"/>
    <link rel="stylesheet" href="./studentappointment.css"/>
    <title>Create an Appointment</title>
</head>
<body>
    <?php
    //   include_once("../../includes/main-user-navbar.php");    
    ?>

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
         <section class="main-section">
            <nav class="dashboard-main_nav">
                <div class="main-nav_header">
                    <!-- <i class="fas fa-arrow-left"></i> -->
                    <i class="fas fa-bars appointment-menu"></i>
                    <h4 class="page-header">Book Appointment</h4>
                </div>
                <div class="main-nav_tools">
                    <i class="fas fa-bell"></i>
                </div>
            </nav>
            <div class="card-container">
                <div class="card">
                    <div class="card-body">
                        <form class="book-appointment">
                            <h5 class="form-header">Book an Appointment</h5>
                            <div class="card_form-detail">
                                <label>First Name</label>
                                <input type="text" name="firstname" />
                            </div>
                            <div class="card_form-detail">
                                <label>Last Name</label>
                                <input type="text" name="lastname" />
                            </div>
                            <div class="card_form-detail">
                                <label>Choose Appoinment Date</label>
                                <input type="date" name="appoinment-date" />
                            </div>
                            <div class="card_form-detail">
                                <label>Choose Appoinment Time</label>
                                <input type="time" name="appoinment-time" />
                            </div>
                            <div class="card_form-detail">
                                <label>Send a message to supervisor</label>
                                <textarea name="student-message" rows="4" cols="50"></textarea>
                            </div>
                            <button type="submit">Book now</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
   

    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
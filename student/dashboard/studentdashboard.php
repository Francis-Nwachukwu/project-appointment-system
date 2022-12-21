<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./studentdashboard.css"/>
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../fontawesome-free-5.12.1-web/css/all.min.css"/>
    <title>Student Dashboard</title>
</head>
<body>
    <nav class="navbar bg-light">
      <div class="container-fluid">
        <a href="../../index/index.php" class="navbar-brand">Appointment Scheduling</a>
        <div class="nav-userInfo">
            <div class="userInfo">
                <i class="fas fa-user userInfo_icon"></i>
                <h4>Hi, Francis</h4>    
            </div>
        </div>
        
      </div>
    </nav>
    <div class="dashboard">
        <aside class="dashboard-sidebar">
            <div class="sidebar-list_container">
                <ul class="sidebar-list">
                    <li class="sidebar-list_item active">
                        <a href="./studentdashboard.php">
                            <div>
                                <i class="fas fa-chart-line"></i>Dashboard
                            </div>
                        </a>
                    </li>
                    <li class="sidebar-list_item">
                        <a href="../../appointment/studentappointment/studentapppointment.php">
                            <div>
                                <i class="fas fa-calendar-check"></i>Appointment
                            </div>
                        </a>
                    </li>
                    <li class="sidebar-list_item">
                        <a href="./studentdashboard.php">
                            <div>
                                <i class="fas fa-search"></i>Search
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <section class="dashboard-main">
            <nav class="dashboard-main_nav">
                <div class="main-nav_header">
                    <!-- <i class="fas fa-arrow-left"></i> -->
                    <i class="fas fa-bars dashboard-menu"></i>
                    <h4 class="page-header">Dashboard</h4>
                </div>
                <div class="main-nav_tools">
                    <i class="fas fa-bell"></i>
                    
                </div>
            </nav>
            <div class="dashboard-main_content">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">2</h5>
                                    <p class="card-text">Total New Appointment</p>
                                    <a href="#" class="btn btn-warning">View Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">1</h5>
                                    <p class="card-text">Total Approved</p>
                                    <a href="#" class="btn btn-success">View Detail</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">0</h5>
                                    <p class="card-text">Cancelled Appointment</p>
                                    <a href="#" class="btn btn-danger">View Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">3</h5>
                                    <p class="card-text">Total Appointment</p>
                                    <a href="#" class="btn btn-primary">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-content_info">
                        <p>Student Appointment Schedling</p>
                    </div> 
                </div>
            </div>
        </section>
    </div>

    <?php
    include_once("../../footer/footer.php");
    ?>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
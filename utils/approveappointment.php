<?php

    include("./db.php");
    include("./functions.php");

    $supervisor_id = check_supervisor_login($con);

    $error_msg = "";
    if(isset($_SERVER["REQUEST_METHOD"]) == "POST") {
        $student_id = $_POST['student_id'];

        $approveQuery = "UPDATE Appointments SET appointmentStatus = 'Approved' WHERE studentID = '$student_id'";
        mysqli_query($con, $approveQuery);

        header("Location: ../appointment/approvedappointment/approvedappointment.php");
        exit();
    } else {
        $error_msg = "Some error occurred";
        header("Location: ../appointment/approvedappointment/approvedappointment.php?error=error");
        exit();
    }


?>
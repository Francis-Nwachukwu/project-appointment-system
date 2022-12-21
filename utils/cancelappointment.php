<?php

    include("./db.php");
    include("./functions.php");

    $supervisor_id = check_supervisor_login($con);

    $error_msg = "";
    if(isset($_SERVER["REQUEST_METHOD"]) == "POST") {
        $student_id = $_POST['student_id'];

        $cancelQuery = "UPDATE Appointments SET appointmentStatus = 'Cancelled' WHERE studentID = '$student_id'";
        mysqli_query($con, $cancelQuery);

        header("Location: ../appointment/cancelledappointment/cancelledappointment.php");
        exit();
    } else {
        $error_msg = "Some error occurred";
        header("Location: ../appointment/cancelledappointment/cancelledappointment.php?error=error");
        exit();
    }


?>
<?php

    include("./db.php");
    include("./functions.php");

    $supervisor_id = check_supervisor_login($con);

    $error_msg = "";
    if(isset($_SERVER["REQUEST_METHOD"]) == "POST") {
        $student_id = $_POST['student_id'];
        $supervisor_message = $_POST['supervisor_message'];

        $student = getStudent($con, $student_id);

        $sendMessageQuery = "UPDATE Students SET supervisor_message = '$supervisor_message' WHERE student_id = '$student_id'";
        mysqli_query($con, $sendMessageQuery);

        header("Location: ../dashboard/supervisordashboard/supervisordashboard.php");
        exit();
    } else {
        $error_msg = "Some error occurred";
        header("Location: ../dashboard/supervisordashboard/supervisordashboard.php?error=error");
        exit();
    }


?>
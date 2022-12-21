<?php

    include("./db.php");
    include("./functions.php");

    $logged_in_student = check_student_login($con);

    $error_msg = "";
    if(isset($_SERVER["REQUEST_METHOD"]) == "POST") {
        print_r($_POST["student-message"]);

        $appointment_date = $_POST["appointment-date"];
        $appointment_time = $_POST["appointment-time"];
        $student_message = $_POST["student-message"];

        $currentStudent = $logged_in_student['student_id'];

        $checkExistingStudent = "SELECT * FROM Appointments where studentID = '$currentStudent' limit 1";
        $queryResult = mysqli_query($con, $checkExistingStudent);
        if($queryResult && mysqli_num_rows($queryResult) > 0) {
          $error_msg = "student=exists";
          header("Location: ../appointment/studentappointment/studentappointment.php?$error_msg");
          exit();
        }

        if(!empty($appointment_date) && !empty($appointment_time) && !empty($student_message)) {
            // save appointment to database

            $query = "INSERT INTO Appointments (studentID, appointmentDate, appointmentTime, studentMessage) VALUES ('$currentStudent', '$appointment_date','$appointment_time', '$student_message')";

            mysqli_query($con, $query);
            header("Location: ../dashboard/studentdashboard/studentdashboard.php");
            // die;
            exit();

        } else {
            $error_msg = "error=wronginput";
            header("Location: ../appointment/studentappointment/studentappointment.php?$error_msg");
            exit();
        }
    }


?>
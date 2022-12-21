<?php

session_start();

    function check_student_login($con) {
        if(isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $queryStudent = "SELECT * FROM STUDENTS WHERE student_id = '$id' limit 1";

            $studentResult = mysqli_query($con, $queryStudent);
            if($studentResult && mysqli_num_rows($studentResult) > 0) {
                $student_data = mysqli_fetch_assoc($studentResult);
                return $student_data;
            }
        } 
        // redirect to login page
        header("Location: ../../index/index.php");
        die;
    }
    function check_supervisor_login($con) {
        if(isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $querySupervisor = "SELECT * FROM SUPERVISORS WHERE supervisor_id = '$id' limit 1";

            $supervisorResult = mysqli_query($con, $querySupervisor);
            if($supervisorResult && mysqli_num_rows($supervisorResult) > 0) {
                $supervisor_data = mysqli_fetch_assoc($supervisorResult);
                return $supervisor_data;
            } 
        } 
        // redirect to login page
        header("Location: ../../index/index.php");
        die;
    }

    function getStudentAppointment($con) {
        $student_data = check_student_login($con);
        $student_id = $student_data['student_id'];

        $appointmentQuery = "SELECT * FROM Appointments where studentID = '$student_id' limit 1";

        $appointmentResult = mysqli_query($con, $appointmentQuery);
        if($appointmentResult && mysqli_num_rows($appointmentResult) > 0) {
            $appointment_data = mysqli_fetch_assoc($appointmentResult);
            return $appointment_data;
        } 
    }
    function getPendingAppointment($con) {
        $pendingAppointmentQuery = "SELECT * FROM Appointments where appointmentStatus = 'Pending'";

        $pendingResult = mysqli_query($con, $pendingAppointmentQuery);
        if($pendingResult && mysqli_num_rows($pendingResult) > 0) {
            $pendingAppointment_data = mysqli_fetch_assoc($pendingResult);
            return $pendingAppointment_data;
        }
    }
    function getPendingAppointmentNum($con) {
        $pendingAppointmentQuery = "SELECT * FROM Appointments where appointmentStatus = 'Pending'";

        $pendingResult = mysqli_query($con, $pendingAppointmentQuery);
        $count = mysqli_num_rows($pendingResult);
        return $count;
    }
    function getApprovedAppointment($con) {

        $appointmentQuery = "SELECT * FROM Appointments where appointmentStatus = 'Approved'";

        $appointmentResult = mysqli_query($con, $appointmentQuery);
        if($appointmentResult && mysqli_num_rows($appointmentResult) > 0) {
            $appointment_data = mysqli_fetch_assoc($appointmentResult);
            return $appointment_data;
        }
    }
    function getApprovedAppointmentNum($con) {
        $pendingAppointmentQuery = "SELECT * FROM Appointments where appointmentStatus = 'Approved'";

        $pendingResult = mysqli_query($con, $pendingAppointmentQuery);
        $count = mysqli_num_rows($pendingResult);
        return $count;
    }
    function getCancelledAppointment($con) {

        $appointmentQuery = "SELECT * FROM Appointments where studentID = appointmentStatus = 'Cancelled'";

        $appointmentResult = mysqli_query($con, $appointmentQuery);
        if($appointmentResult && mysqli_num_rows($appointmentResult) > 0) {
            $appointment_data = mysqli_fetch_assoc($appointmentResult);
            return $appointment_data;
        }
    }
    function getCancelledAppointmentNum($con) {
        $pendingAppointmentQuery = "SELECT * FROM Appointments where appointmentStatus = 'Cancelled'";

        $pendingResult = mysqli_query($con, $pendingAppointmentQuery);
        $count = mysqli_num_rows($pendingResult);
        return $count;
    }
    
    function random_id() {
        $text = "";

        for($i = 0; $i < 10; $i++) {
            $text .= rand(0, 9);
        }
        return $text;
    }
?>
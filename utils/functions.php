<?php

session_start();

    function check_login($con) {
        if(isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $query = "SELECT * FROM STUDENTS WHERE student_id = '$id' limit 1";

            $result = mysqli_query($con, $query);
            if($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        } 
        // redirect to login page
        header("Location: ../../home/home.php");
        die;
    }
    
    function random_id() {
        $text = "";

        for($i = 0; $i < 10; $i++) {
            $text .= rand(0, 9);
        }
        return $text;
    }
?>
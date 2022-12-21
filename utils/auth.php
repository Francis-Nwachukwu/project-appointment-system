<?php
// session_start();

  include("./db.php");
  include("./functions.php");


   $error_msg = "";
        if(isset($_POST["student-signing-up"])) {

        // =========== sign up ====================

        $firstname = $_POST["studentFirstname"];
        $lastname = $_POST["studentLastname"];
        $email = $_POST["studentEmail"];
        $password = $_POST["studentPassword"];
        $confirmpassword = $_POST["studentConfirmPassword"];

        $img_name = $_FILES["userImg"]["name"];
        $img_size = $_FILES["userImg"]["size"];
        $tmp_name = $_FILES["userImg"]["tmp_name"];
        $error = $_FILES["userImg"]["error"];

        if($password !== $confirmpassword) {
          $error_msg = "passwords=mismatch";
          header("Location: ../index/index.php?$error_msg");
          exit();
        }

        $checkExistingEmail = "SELECT * FROM Students where email = '$email' limit 1";
        $queryResult = mysqli_query($con, $checkExistingEmail);
        if($queryResult && mysqli_num_rows($queryResult) > 0) {
          $error_msg = "email=exists";
          header("Location: ../index/index.php?$error_msg");
          exit();
        }

        if($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = "../uploads/".$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                // exit();
              } else {
                $error_msg = "type=unknown";
                header("Location: ../index/index.php?$error_msg");
                exit();
               }
          } else {
              $error_msg = "imageupload=unknownerror";
              header("Location: ../index/index.php?$error_msg");
              exit();
          }

            if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($confirmpassword)) {
                // save to database
                $student_id = random_id();
                $query = "INSERT INTO Students (student_id, firstname, lastname, email, password, userImage) VALUES ('$student_id', '$firstname','$lastname', '$email','$password', '$new_img_name')";

                mysqli_query($con, $query);
                $_SESSION['user_id'] = $student_id;
                header("Location: ../dashboard/studentdashboard/studentdashboard.php");
                // die;

            } else {
                $error_msg = "error=wronginput";
                header("Location: ../index/index.php?$error_msg");
                exit();
            }

        } else if(isset($_POST["student-signing-in"])) {
            // ========== student login ==============

            $email = $_POST["studentEmail"];
            $password = $_POST["studentPassword"];

            if(!empty($email) && !empty($password)) {
                // read from database
                $query = "SELECT * FROM Students where email='$email' limit 1";

                $result = mysqli_query($con, $query);

                if($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password) {
                        $_SESSION['user_id'] = $user_data['student_id'];
                        header("Location: ../dashboard/studentdashboard/studentdashboard.php");
                        // die;
                    } else {
                        $error_msg = "error=incorrect";
                        header("Location: ../index/index.php?$error_msg");
                        exit();
                    }
                } else {
                  $error_msg = "error=incorrect";
                  header("Location: ../index/index.php?$error_msg");
                  exit();
                }
            }

        } else if(isset($_POST["supervisor-signing-up"])) {
        // ========== supervisor signup =================

        $firstname = $_POST["supervisorFirstname"];
        $lastname = $_POST["supervisorLastname"];
        $email = $_POST["supervisorEmail"];
        $password = $_POST["supervisorPassword"];
        $confirmpassword = $_POST["supervisorConfirmPassword"];
        $img_name = $_FILES["supervisorImg"]["name"];
        $img_size = $_FILES["supervisorImg"]["size"];
        $tmp_name = $_FILES["supervisorImg"]["tmp_name"];
        $error = $_FILES["supervisorImg"]["error"];

        if($password !== $confirmpassword) {
          $error_msg = "passwords=mismatch";
          header("Location: ../index/index.php?$error_msg");
          exit();
        }

        $checkExistingEmail = "SELECT * FROM Supervisors where email = '$email' limit 1";
        $queryResult = mysqli_query($con, $checkExistingEmail);
        if($queryResult && mysqli_num_rows($queryResult) > 0) {
          $error_msg = "email=exists";
          header("Location: ../index/index.php?$error_msg");
          exit();
        }

        if($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = "../uploads/".$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                // exit();
              } else {
                $error_msg = "type=unknown";
                header("Location: ../index/index.php?$error_msg");
                exit();
               }
          } else {
              $error_msg = "imageupload=unknownerror";
              header("Location: ../index/index.php?$error_msg");
              exit();
          }

        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($confirmpassword)) {
            // save to database
            $supervisor_id = random_id();
            $query = "INSERT INTO Supervisors (supervisor_id, firstname, lastname, email, password) VALUES ('$supervisor_id', '$firstname','$lastname', '$email','$password')";

            mysqli_query($con, $query);
            $_SESSION['user_id'] = $supervisor_id;
            header("Location: ../dashboard/supervisordashboard/supervisordashboard.php");
            // die;

        } else {
            $error_msg = "error=wronginput";
            header("Location: ../index/index.php?$error_msg");
            exit();
        }

          } else if(isset($_POST["supervisor-signing-in"])) {
          // ============== supervisor login ===============

          $email = $_POST["supervisorEmail"];
          $password = $_POST["supervisorPassword"];

            if(!empty($email) && !empty($password)) {
                // read from database
                $query = "SELECT * FROM Supervisors where email='$email' limit 1";

                $result = mysqli_query($con, $query);

                if($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password) {
                        $_SESSION['user_id'] = $user_data['supervisor_id'];
                        header("Location: ../dashboard/supervisordashboard/supervisordashboard.php");
                        // die;
                    } else {
                        $error_msg = "error=incorrect";
                        header("Location: ../index/index.php?$error_msg");
                        exit();
                    }
                } else {
                  $error_msg = "error=incorrect";
                  header("Location: ../index/index.php?$error_msg");
                  exit();
                }
            }
          }

?>

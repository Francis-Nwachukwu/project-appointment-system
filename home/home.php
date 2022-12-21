<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../fontawesome-free-5.12.1-web/css/all.min.css"/>
    <title>Project Appointment Scheduling System</title>
    <link rel="stylesheet" href="./home.css" />
  </head>
  <body>

    <?php
      include_once("../includes/main-navbar.php");
    ?>


    <section class="main-section">
      <div class="card-container"> 
        <div class="card student">
          <div class="card-body">
            <form action="../utils/auth.php" class="studentFormbox  studentRegister" method="POST" enctype="multipart/form-data">
              <h5>Sign up with your Student account</h5>
              <div class="card_form-detail">
                <label>First Name</label>
                <input type="text" name="studentFirstname" required/>
              </div>
              <div class="card_form-detail">
                <label>Last Name</label>
                <input type="text" name="studentLastname" required />
              </div>
              <div class="card_form-detail">
                <label>Email</label>
                <input type="email" name="studentEmail" required />
              </div>
              <div class="card_form-detail">
                <label>Password</label>
                <input type="password" name="studentPassword" required />
              </div>
              <div class="card_form-detail">
                <label>Confirm password</label>
                <input type="password" name="studentConfirmPassword" required />
              </div>
               <div class="card_form-detail">
                <label>Upload Profile Picture</label>
                <input type="file" name="userImg" required />
              </div>
              <input type="hidden" name="student-signing-up" value="true">
              <button type="submit">Register</button>
              <div class="form-msg_container">
                <p class="form-msg">
                  Already have an account?
                  <button
                    type="button"
                    class="toggleBtn"
                    data-target="studentLogin"
                  >
                    Login
                  </button>
                </p>
              </div>
              
            </form>
          </div>
          <div class="card-body">
            <form class="studentFormbox active studentLogin" action="../utils/auth.php" method="POST">
              <input type="hidden" name="student-signing-in" value="1000">
              <h5>Login with your student details</h5>
              <div class="card_form-detail">
                <label>Email</label>
                <input type="email" name="studentEmail" required />
              </div>
              <div class="card_form-detail">
                <label>Password</label>
                <input type="password" name="studentPassword" required />
              </div>
              
              <button type="submit">Login</button>
              <div class="form-msg_container">
                <p class="form-msg">
                Don't have an account?
                <button
                  type="button"
                  class="toggleBtn"
                  data-target="studentRegister"
                >
                  Register
                </button>
              </p>
              </div>
              
            </form>
          </div>
        </div>
        <div class="card supervisor">
          <div class="card-body">
            <form
              class="supervisorFormbox  supervisorRegister"
              action="../utils/auth.php"
              method="POST"
              enctype="multipart/form-data"
            >
              <h5>Sign up with your Supervisor account</h5>
              <div class="card_form-detail">
                <label>First Name</label>
                <input type="text" name="supervisorFirstname" required />
              </div>
              <div class="card_form-detail">
                <label>Last Name</label>
                <input type="text" name="supervisorLastname" required />
              </div>
              <div class="card_form-detail">
                <label>Email</label>
                <input type="email" name="supervisorEmail" required />
              </div>
              <div class="card_form-detail">
                <label>Password</label>
                <input type="password" name="supervisorPassword" required />
              </div>
              <div class="card_form-detail">
                <label>Confirm password</label>
                <input type="password" name="supervisorConfirmPassword" required />
              </div>
              <div class="card_form-detail">
                <label>Upload Profile Picture</label>
                <input type="file" name="supervisorImg" required />
              </div>
              <input type="hidden" name="supervisor-signing-up" value="true">
              <button class="registerBtn" type="submit">Register</button>
              <div class="form-msg_container">
                <p class="form-msg">
                Already have an account?
                <button
                  type="button"
                  class="toggleBtn"
                  data-target="supervisorLogin"
                >
                  Login
                </button>
              </p>
              </div>
              
            </form>
          </div>
          <div class="card-body">
            <form
              class="supervisorFormbox active supervisorLogin"
              action="../utils/auth.php"
              method="POST"
            >
              <h5>Login with your Supervisor details</h5>
              <div class="card_form-detail">
                <label>Email</label>
                <input type="email" name="supervisorEmail" required />
              </div>
              <div class="card_form-detail">
                <label>Password</label>
                <input type="password" name="supervisorPassword" required />
              </div>
              <input type="hidden" name="supervisor-signing-in" value="true">
              <button type="submit">Login</button>
              <div class="form-msg_container">
                <p class="form-msg">
                  Don't have an account?
                  <button
                    type="button"
                    class="toggleBtn"
                    data-target="supervisorRegister"
                  >
                    Register
                  </button>
                </p>
              </div>
              
            </form>
          </div>
        </div>
        <?php
      $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      
      if (strpos($fullUrl, "passwords=mismatch") == true) {
        echo "<div class='alert'>Passwords do not match</div>";
        exit();
      } elseif (strpos($fullUrl, "email=exists") == true) {
        echo "<div class='alert'>Email Address already exists</div>";
        exit();
      } elseif (strpos($fullUrl, "type=unknown") == true) {
        echo "<div class='alert'>Image type must be JPG, JPEG or PNG</div>";
        exit();
      } elseif (strpos($fullUrl, "imageupload=unknownerror") == true) {
        echo "<div class='alert'>Unknown error occurred with image upload</div>";
        exit();
      } elseif (strpos($fullUrl, "error=wronginput") == true) {
        echo "<div class='alert'>Please input valid details</div>";
        exit();
      } elseif (strpos($fullUrl, "error=incorrect") == true) {
        echo "<div class='alert'>Wrong email or password</div>";
        exit();
      } elseif (strpos($fullUrl, "error=incorrect") == true) {
        echo "<div class='alert'>Wrong email or password</div>";
        exit();
      } 
    ?> 
      </div>
      
    <!-- <div class='alert'>email or password</div> -->
    </section>
    

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="./home.js"></script>
  </body>
</html>

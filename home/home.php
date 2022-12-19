<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Project Appointment Scheduling System</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="./home.css" />
  </head>
  <body>
    <nav class="navbar bg-light">
      <div class="container-fluid">
        <a class="navbar-brand">Appointment Scheduling</a>
      </div>
    </nav>

    <section class="main-section">
      <div class="card-container">
        <div class="card student">
          <div class="card-body">
            <form class="studentFormbox active studentRegister">
              <h5>Sign up with your Student account</h5>
              <div class="card_form-detail">
                <label>First Name</label>
                <input type="text" name="firstname" />
              </div>
              <div class="card_form-detail">
                <label>Last Name</label>
                <input type="text" name="lastname" />
              </div>
              <div class="card_form-detail">
                <label>Email</label>
                <input type="email" name="email" />
              </div>
              <div class="card_form-detail">
                <label>Password</label>
                <input type="password" name="password" />
              </div>
              <div class="card_form-detail">
                <label>Confirm password</label>
                <input type="password" name="confirmPassword" />
              </div>
               <div class="card_form-detail">
                <label>Upload Profile Picture</label>
                <input type="file" name="userImg" />
              </div>
              <button type="submit">Register</button>
              <p>
                Already have an account?
                <button
                  type="button"
                  class="toggleBtn"
                  data-target="studentLogin"
                >
                  Login
                </button>
              </p>
            </form>
          </div>
          <div class="card-body">
            <form class="studentFormbox studentLogin" action="../dashboard/studentdashboard/studentdashboard.php" method="POST">
              <h5>Login with your student details</h5>
              <div class="card_form-detail">
                <label>Email</label>
                <input type="email" name="email" />
              </div>
              <div class="card_form-detail">
                <label>Password</label>
                <input type="password" name="password" />
              </div>
              <button type="submit">Login</button>
              <p>
                Don't have an account?
                <button
                  type="button"
                  class="toggleBtn"
                  data-target="studentRegister"
                >
                  Register
                </button>
              </p>
            </form>
          </div>
        </div>
        <div class="card supervisor">
          <div class="card-body">
            <form
              class="supervisorFormbox active supervisorRegister"
              action=""
              method=""
            >
              <h5>Sign up with your Supervisor account</h5>
              <div class="card_form-detail">
                <label>First Name</label>
                <input type="text" name="firstname" />
              </div>
              <div class="card_form-detail">
                <label>Last Name</label>
                <input type="text" name="lastname" />
              </div>
              <div class="card_form-detail">
                <label>Email</label>
                <input type="email" name="email" />
              </div>
              <div class="card_form-detail">
                <label>Password</label>
                <input type="password" name="password" />
              </div>
              <div class="card_form-detail">
                <label>Confirm password</label>
                <input type="password" name="confirmPassword" />
              </div>
              <button class="registerBtn" type="submit">Register</button>
              <p>
                Already have an account?
                <button
                  type="button"
                  class="toggleBtn"
                  data-target="supervisorLogin"
                >
                  Login
                </button>
              </p>
            </form>
          </div>
          <div class="card-body">
            <form
              class="supervisorFormbox supervisorLogin"
              action=""
              method="POST"
            >
              <h5>Login with your Supervisor details</h5>
              <div class="card_form-detail">
                <label>Email</label>
                <input type="email" name="email" />
              </div>
              <div class="card_form-detail">
                <label>Password</label>
                <input type="password" name="password" />
              </div>
              <button type="submit">Login</button>
              <p>
                Don't have an account?
                <button
                  type="button"
                  class="toggleBtn"
                  data-target="supervisorRegister"
                >
                  Register
                </button>
              </p>
            </form>
          </div>
        </div>
      </div>
    </section>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="./home.js"></script>
  </body>
</html>

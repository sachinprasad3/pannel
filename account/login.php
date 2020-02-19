<?php
session_start();

if (isset($_SESSION['email'])) {
  header('location:dashboard.php');
}

include '../database/config.php';
$data = new database();
$msg="";
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $login = $data->login($email,$password);
  if ($login) {
    header('location:dashboard.php');
  }else {
    $msg = "Invalid email or password";
  }
}
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../static/css/style.css" type="text/css" >
    <title>Log In - Wingx</title>
  </head>
  <body>

    <section>
      <div class="container-fluid pl-0">
        <div class="row m-0 p-0">
          <div class="col-md-6 p-0 login">
            <img src="../static/images/login.jpg" alt="">
          </div>
          <div class="col-md-6">
            <div class="container center">
              <h3 class="brand2">User Login</h3>
              <div class="log-sign-form">
                <h5>Please login with correct information</h5>
                <p class="alert alert-danger"><?php echo $msg; ?></p>
                <form action="" method="post">
                  <fieldset class="form-group">
                    <input type="email" class="form-control" name="email"  id="username" placeholder="Email address">
                  </fieldset>
                  <fieldset class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </fieldset>
                  <input type="submit" class="btn btn-log" name="login" value="LOG IN">
                </form>
                <br>
                <!-- <a href="#" class="forgot-password">Forgot your password?</a> -->
                <hr class="line">
                <span><p>Don't have an account?</p></span><br/>
                <a href="signup.php" class="btn btn-up" >Sign up </a>
                <!-- <p class="text-divider"><span>New to Bezzie?</span></p> -->
                <!-- <hr class="text-divider" > -->
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

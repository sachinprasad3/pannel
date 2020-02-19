<?php
session_start();
include '../database/config.php';
$data = new database();
if (isset($_SESSION['email'])) {
  header('location:../home.php');
}
$msg ="";
$error = false;
$name= $phone="";
$nameErr= $phoneErr="";
if (isset($_POST['signup']) && $_SERVER['REQUEST_METHOD']=='POST') {
  //echo "<script>alert('yes');</script>";

  // $name=$_POST['name'];
  // $email=$_POST['email'];
  // $phone=$_POST['phone'];
  // //echo $phone;
  // $dob=$_POST['day']."/".$_POST['month']."/".$_POST['year'];
  // //echo $dob;
  // $gender=$_POST['gender'];
  // //echo $gender;
  // $pass1=$_POST['pass1'];
  // $pass2=$_POST['pass2'];
  if (empty($_POST['name']) || empty($_POST['email'])|| empty($_POST['phone'])|| empty($_POST['gender'])||empty($_POST['day']&&$_POST['month']&&$_POST['year'])) {
    $msg="All fields are required";
  }
  else {
    $name=$_POST['name'];
    // if (!preg_match("/^[a-zA-Z ]*$/",$name) {
    //   $msg="Name should be letters only";
    // }
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $error = true;
    }

    $email=$_POST['email'];
    $phone=$_POST['phone'];
    if (preg_match("/^[6-9]{2}-[0-9]{4}-[0-9]{4}$/", $phone)) {
      $phoneErr="Invalid phone number";
      $error = true;
    }

    //echo $phone;
    $dob=$_POST['day']."/".$_POST['month']."/".$_POST['year'];
    //echo $dob;
    $gender=$_POST['gender'];
    //echo $gender;
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];


  if ($pass1 == $pass2) {
    if ($error == false) {
      $signUp = $data->User_Reg($name,$email,$phone,$dob,$gender,$pass1);
      if ($signUp) {
        echo "<script>alert('registered');</script>";
      }
    }else{
      $msg ="Something went wrong";
    }

  }else {
    echo "<script>alert('password not matched');</script>";
  }
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
    <title>Sign Up</title>
  </head>
  <body>

    <section>
      <div class="container-fluid pl-0">
        <div class="row m-0 p-0">
          <div class="col-md-6 p-0 login">
            <img src="../static/images/login.jpg" alt="">
          </div>
          <div class="col-md-6 pb-5">
            <div class="container center">
              <h3 class="brand2">Sign Up</h3>
              <div class="log-sign-form">
                <h5>Please fill correct details</h5>
                <p class="alert alert-danger"><?php echo $msg; ?></p>
                <form action="" method="post">
                  <fieldset class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="What should we call you?">
                    <p><?php echo $nameErr; ?></p>
                  </fieldset>
                  <fieldset class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                  </fieldset>
                  <fieldset class="form-group">
                    <input type="tel" class="form-control" name="phone" placeholder="phone" maxlength="10">
                    <p><?php echo $phoneErr; ?></p>

                  </fieldset>
                  <fieldset class="form-group">
                    <input type="password" class="form-control" name="pass1" placeholder="Password">
                  </fieldset>
                  <fieldset class="form-group">
                    <input type="password" class="form-control" name="pass2" placeholder="Confirm password">
                  </fieldset>
                  <fieldset class="form-group">
                    <!-- <span class="label label-default">Date of Birth</span><br> -->
                    <label for="formGroupExampleInput" id="signup-label">Date of Birth</label>
                    <div class="row m-0 p-0">
                      <input type="text" class="form-control col-3 dob" name="day" id="day" placeholder="Day" maxlength="2">

                      <select class="form-control col-5 dob month" name="month" >
                        <option value="">select Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">october</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>

                      <!-- <select class="form-control" name="month" required>
                        <option value="">select one</option>
                      </select> -->

                      <input type="text" class="form-control col-3 dob" name="year" id="year" placeholder="Year" maxlength="4">
                  </div><!-- row -->
                  </fieldset>
                  <!-- gender -->
                  <fieldset class="form-group">
                    <label for="formGroupExampleInput" id="signup-label">Gender</label><br>
                    <label class="radio-inline"><input type="radio" name="gender" value="m"> Male</label>
                    <label class="radio-inline Female"><input type="radio" name="gender" value="f"> Female</label>
                    <label class="radio-inline"><input type="radio" name="gender" value="o"> Other</label>
                  </fieldset>
                  <!-- /gender -->
                  <div class="btn-center">

                  <input type="submit" class="btn btn-sign" name="signup" value="sign up"><br>

                </div>
                </form>
                <p class="link">Already have an account?<a href="login.php">&nbsplog in</a></p><br/>
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

<?php
class database
{
  private $host = 'localhost';
  private $db = 'db_pannel';
  private $username = 'root';
  private $password = "";
  public $conn;


  function __construct()
  {
    date_default_timezone_set('Asia/Kolkata');
    $this->conn = new mysqli($this->host,$this->username,$this->password,$this->db);
    //echo "yesss";
  }

  //admin login
  function Adminlogin($email,$password)
  {
    $select_query = "SELECT * from `admin` WHERE email='$email'";
    $result = $this->conn->query($select_query);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if (password_verify($password,$row['password'])) {
          $_SESSION['email'] = $email;
          $_SESSION['username']=$row['name'];
          header('location:dashboard.php');
        }
      }
    }
  }
  //user login
  function login($email,$password)
  {
    $select_query = "SELECT * from `users` WHERE email='$email'";
    $result = $this->conn->query($select_query);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if (password_verify($password,$row['password'])) {
          $_SESSION['email'] = $email;
          $_SESSION['username']=$row['name'];
          header('location:dashboard.php');
        }
      }
    }
  }

  // user registration

  function User_Reg($name,$email,$phone,$dob,$gender,$pass1)
  {
    // user checking

    $check_user = "SELECT * from `users` WHERE email = '$email'";
    $user = $this->conn->query($check_user);
    $result = $user->num_rows;

    if ($result == 0) {
      $password_encript = password_hash($pass1,PASSWORD_DEFAULT);
      $insert_query = "INSERT into `users`(name,email,phone,dob,gender,password,created_at)VALUES('$name','$email','$phone','$dob','$gender','$password_encript',now())";
      $query = $this->conn->query($insert_query);
      return $query;
    }else {
      echo "<script>alert('already registered...');</script>";
    }

  }

  // Find User ID
  function FindUserId($user_email)
  {
    $select_query = "SELECT id from `users` WHERE email = '$user_email'";
    $result = $this->conn->query($select_query);
    if ($result->num_rows>0) {
      while ($r= $result->fetch_assoc()) {
        $userId = $r['id'];
    }
  }
  return $userId;
  }

  // // developers lsit
  // function developersList()
  // {
  //   $select_query = "SELECT id,name from `users`";
  //   $result = $this->conn->query($select_query);
  //   if ($result->num_rows>0) {
  //     while ($row = $result->fetch_assoc()) {
  //       $rows[] = $row;
  //     }
  //   }
  //   return $rows;
  //   //print_r($rows);
  // }

  // users
  function ViewUsers()
  {
    $select_query = "SELECT * from `users`";
    $result = $this->conn->query($select_query);
    if ($result->num_rows>0) {
      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
    }
    return $rows;
    //print_r($rows);
  }

  //delete User
  function DeleteUser($userId)
  {
    $delete = "DELETE FROM `users` WHERE id = $userId";
    $result = $this->conn->query($delete);
    return $delete;
  }

  // add projects

  function addProject($aDate,$fDate,$title,$customer,$assign_to)
  {
    $status='0';
    $insert_query = "INSERT into `projects`(title,customer,assign_to,assign_date,finished_date,status,created_at)VALUES('$title','$customer','$assign_to','$aDate','$fDate','$status',now())";
    $query = $this->conn->query($insert_query);
    return $query;
  }

  // view projects

  function ViewProjects()
  {
    $select_query = "SELECT * from `projects`";
    $result = $this->conn->query($select_query);
    if ($result->num_rows>0) {
      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
    }
    return $rows;
  }

  //delete project work
  function DeleteWokr($projectId)
  {
    $delete = "DELETE FROM `projects` WHERE id = $projectId";
    $result = $this->conn->query($delete);
    return $delete;
  }
  //view pending $projects
  function ViewPendingProjects()
  {
    $select_query = "SELECT * from `projects` WHERE status = 0";
    $result = $this->conn->query($select_query);
    if ($result->num_rows>0) {
      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
    }
    return $rows;
  }

  // view total finished works
  function ViewTotalFworks()
  {
    $select_query = "SELECT * from `projects` WHERE status = 1";
    $result = $this->conn->query($select_query);
    if ($result->num_rows>0) {
      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
    }
    return $rows;
  }

  // count total Works
function TotalAssignWork()
{

    $select_query = "SELECT * from `projects`";
    $result = $this->conn->query($select_query);
    $count = $result->num_rows;
     return $count;
  }

  function TotalFinishWork()
  {

      $select_query = "SELECT * from `projects` WHERE status = 1";
      $result = $this->conn->query($select_query);
      $count = $result->num_rows;
       return $count;
    }

    function TotalPendinghWork()
    {

        $select_query = "SELECT * from `projects` WHERE status = 0";
        $result = $this->conn->query($select_query);
        $count = $result->num_rows;
         return $count;
      }

      function TotalUser()
      {

          $select_query = "SELECT * from `users`";
          $result = $this->conn->query($select_query);
          $count = $result->num_rows;
           return $count;
        }

  //view projects for particular login User_Reg
  function ViewAssignProjects($user_email)
  {

    //echo $user_email;
  //   $userId="";
  //   $select_query = "SELECT id from `users` WHERE email = '$user_email'";
  //   $result = $this->conn->query($select_query);
  //   if ($result->num_rows>0) {
  //     while ($r= $result->fetch_assoc()) {
  //       $userId = $r['id'];
  //
  //   }
  // }

    $userId = $this->FindUserId($user_email);

    $rows= array();
    $select_query = "SELECT * from `projects` WHERE assign_to = '$userId' AND status = 0";
    $result = $this->conn->query($select_query);
    if ($result->num_rows>0) {
      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
    }
    return $rows;
  }


//update finished work $status
function Update_FWork_Satus($pr_id)
{
  $Ustatus = '1';
  $update_query = "UPDATE `projects` SET status = '$Ustatus' WHERE id = '$pr_id'";
  $result = $this->conn->query($update_query);
  return $result;
}


// finished works
function ViewFinishedWorks($user_email)
{

  $userId = $this->FindUserId($user_email);

  $rows= array();
  $select_query = "SELECT * from `projects` WHERE assign_to = '$userId' AND status = 1";
  $result = $this->conn->query($select_query);
  if ($result->num_rows>0) {
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }
  }
  return $rows;
}


//User Total Assign
function UserTotalAssign($user_email)
{

  $userId = $this->FindUserId($user_email);

  $select_query = "SELECT * from `projects` WHERE assign_to = '$userId' AND status = 0";
  $result = $this->conn->query($select_query);
  $count = $result->num_rows;
   return $count;
}

// User Total finished
function UserTotalFinish($user_email)
{

  $userId = $this->FindUserId($user_email);

  $select_query = "SELECT * from `projects` WHERE assign_to = '$userId' AND status = 1";
  $result = $this->conn->query($select_query);
  $count = $result->num_rows;
   return $count;
}
  // function addSong($title,$artist,$song)
  // {
  //     $insert_query = "INSERT into `songs`(title,artist,song) values('$title', '$artist', '$song')";
  //     $query = $this->conn->query($insert_query);
  //     return $query;
  //     // echo '<script>alert("successful")</script>';
  //     //header('location:songAdd.php');

  //     // $stmt = $this->conn->prepare("INSERT into `songs`(title,artist,song)
  //     //                    VALUES(?,?,?)");
  //     //   $stmt->bind_param("ssss",$title,$artist,$song);
  //     //   $stmt->execute();
  //     //   $result = $stmt->affected_rows;
  //     //   $stmt->close();
  //     //   return $result;

  // }

  // function displaySong()
  // {
  //   $select_query = "SELECT * from `songs`";
  //   $result = $this->conn->query($select_query);
  //   //print_r($result);
  //   while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  //     $song[]=$row;
  //     //print_r($song);
  //   }
  //   return $song;
  // }
}

 ?>

<?php
session_start();
if(isset($_SESSION['auth'])){
    header("location: index.php");
    exit;
  }
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include('admin/includes/config/dbconnect.php');

  $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
  $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  $cpassword = mysqli_real_escape_string($conn, $_POST["cpassword"]);
  $random_id = rand(time(), 10000000);
  $existsql = "SELECT email FROM `users` WHERE `email` = '$email'";
  $result = mysqli_query($conn, $existsql);
  $numexistrows = mysqli_num_rows($result);
  
  if($numexistrows > 0){
   
    $_SESSION['message'] = "Email already exist";
  }else{
  

  if($password == $cpassword){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    // $sql= "INSERT INTO `users` ( `username`, `email`,`password`, `date`) VALUES ('$username', '$email', '$hash', current_timestamp())";
     

    $sql= "INSERT INTO `users` ( `username`, `fname`, `lname`, `email`, `password`, `unique_id`, `date`) VALUES ('$username', '$fname', '$lname', '$email', '$hash', '$random_id', current_timestamp())";
  
  $result = mysqli_query($conn, $sql);
  if($result){
    $sql2 = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result2 = mysqli_query($conn, $sql2);
    if(mysqli_num_rows($result2) > 0){
    $row = mysqli_fetch_assoc($result2);
    $_SESSION['unique_id'] = $row['unique_id'];
    $_SESSION['message'] = "Your account has created. Now you can login";
   
    header('location: login.php');
    }
  }
}else{
    $_SESSION['message'] = "password do not match";
    }

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <title>SignUp</title>
</head>
<body>
<?php include('includes/navbar.php'); ?>
<?php
    //  if($showAlert){
    // echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    // <strong>Success!</strong>'.$showAlert.'
    // <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    // </div>';
    // }
    // if($showError){
    //   echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //   <strong>Error!</strong> '.$showError.'
    //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //   </div>';
    //   }
    ?>
   
<center>
<div class="py-5">
    <div class="container">
        <div class="row "></div>
            <div class="col-md-5">

            <?php include('message.php') ?>

                <div class="card">
                    <div class="card-header" style = "background-color: yellow">
                    <h3 >SignUp</h3>
                    </div>
                    <div class="card-body">

                        <form action="signup.php" method = "POST">
                            <div class="from-group mb-3" >
                                <label for="fname">Firstname</label>
                                <input type="text" maxlength="30" class="form-control"  name="fname" >
                            </div>
                            <div class="from-group mb-3" >
                                <label for="username">Lastname</label>
                                <input type="text" maxlength="30" class="form-control"  name="lname" >
                            </div>
                            <div class="from-group mb-3" >
                                <label for="username">Username</label>
                                <input type="text" maxlength="30" class="form-control"  name="username" >
                            </div>
                            <div class="from-group mb-3" >
                                <label for="email">Email</label>
                                <input type="email" maxlength="30" class="form-control"  name="email" >
                            </div>
                            <div class="from-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" maxlength="30" class="form-control"  name="password">
                            </div>
                            <div class="from-group mb-3">
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" class="form-control" maxlength="30" name="cpassword">
                                <div class="form-text">Make sure to type the same password</div>
                            </div>
                            <div class= "from-group mb-3" >
                                <button type="submit" class="btn btn-primary" name = "signup_btn">SignUp now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</center>

 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap5.bundle.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>




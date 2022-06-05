<?php
session_start();
if(isset($_SESSION['auth'])){
  header("location: users.php");
  exit;
}

$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include('admin/includes/config/dbconnect.php');
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  
  
  
 
 $sql= "select * from users where email= '$email'";

  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);

  if($num == 1){
    $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row['password'])){
          
        foreach($result as $data){
            $user_username = $data['username'];
            $user_fname = $data['fname'];
            $user_lname = $data['lname'];
            $user_email = $data['email'];
            $unique_id = $data['unique_id'];
            $role_as = $data['role_as'];
        }
        
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = $role_as; // '0' for user and '1' for admin
        $_SESSION['auth_user'] = [
            'username' => $user_username,
            'fname' => $user_fname,
            'lname' => $user_lname,
            'email' => $user_email,
            'unique_id' => $unique_id,
        ];

        if($_SESSION['auth_role'] == '1'){
          header('location: admin/index.php');
          
        }
        else if($_SESSION['auth_role'] == '0'){ 
          //header("location: index.php");
          header("location: users.php");
            
        }
        

        }else{
          
          $_SESSION['message'] = "Invalid inputs";
          header('location: login.php');
          exit(0);
         }
        
       }
       else{
        
        $_SESSION['message'] = "Invalid inputs";
          header('location: login.php');
          exit(0);
       }
     }   
  

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
  <?php include('includes/navbar.php'); ?>

  <!-- successful confermation after signup in login page -->

<?php if(isset($_SESSION['message'])){
      echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>'.$_SESSION['message'].'!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
      unset($_SESSION['message']); //For only 1 time successful confermation after signup
      }
    ?>
     
<center>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center"></div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">

                        <form action="login.php" method = "POST">
                            <div class= "from-group mb-3" >
                                <label for="email">email</label>
                                <input type="email" maxlength="30" class="form-control" name="email">
                            </div>
                            <div class= "from-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" maxlength="30" class="form-control" name="password">
                            </div>
                            
                            <div class= "from-group mb-3" >
                                <button type="submit" class="btn btn-primary">Login now</button>
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
  </body>
</html>

<?php
session_start();
include('includes/navbar.php');
include("admin/includes/config/dbconnect.php");
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
    <style>
/* body {
  background-image: url('https://cdn.pixabay.com/photo/2017/06/29/07/50/q-and-a-2453376_960_720.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
} */
</style>
</head>
<body>

<div class="py-5">
    <div class="container" >
        <div class="row"></div>
        <div class="col-md-12">
           <h1 style = "color: Green"; >Welcome to Question and Answer Website</h1>
           <?php if(isset($_SESSION['auth'])){ ?>
           <div class="wrapper">
                <section class="users">
                <header>
                    <div class="content">
                    <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['auth_user']['unique_id']}");
                        if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                        }
                    ?>
                    <div class="details">
                        <span><b><?php echo $row['fname']. " " . $row['lname'] ?></b></span>
                    </div>
                    </div>
                   
                </header>
                <?php include('admin/message.php') ?>
                
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading"><span>
                    <form action="insert_question.php" method="post">
                        <input type="text" name = 'fpost' class = 'form-control'>
                        <button class = 'btn btn-primary' name = 'fpostbtn'>post</button>
                    </form>
                </span>
                </h4>
                <p></p>
            
                <p class="mb-0"></p>
                
            </div>


                <div class="users-list">
            
                </div>
                </section>
            </div>

            <script src="js/users.js"></script>
        </div>
    </div>

</div>
<?php }; ?>



<?php
include('includes/footer.php');

?>
<?php 
  session_start();
  include('admin/includes/config/dbconnect.php');
  if(!isset($_SESSION['auth_user']['unique_id'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sno = mysqli_real_escape_string($conn, $_GET['sno_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users LEFT JOIN answers ON users.unique_id = answers.responder_id WHERE unique_id = {$user_id} AND answers.answerno = {$sno}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            //header("location: users.php");
          }
        ?>
        <a href="index.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <?php include('admin/message.php') ?>

        
        <div class="details">
          <span><b><?php echo $row['fname']. " " . $row['lname'] ?></b></span> <br>
          <p> <b># <?php echo $row['post'] ?></b></p>
          
          
        </div>
      </header>
      <table>
                    <thead>
                        <tr>
                            <th><h1>comments</h1></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php 

// if($_SERVER["REQUEST_METHOD"]=="POST"){
//   //include('admin/includes/config/dbconnect.php');
//   $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
//   $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
//  // $output = "";

 
  
          $sql2 = "SELECT * FROM comments LEFT JOIN users ON users.unique_id = comments.commenter_id WHERE answer_id = $sno ORDER BY astatus DESC";

          $result2 = mysqli_query($conn, $sql2);

          if(mysqli_num_rows($result2) > 0){
            foreach($result2 as $row2){
              $responder = $row2['responder_id'];
              $sql3 = "SELECT * FROM users WHERE unique_id = $responder";

          $result3 = mysqli_query($conn, $sql3);

          if(mysqli_num_rows($result3) > 0){
            foreach($result3 as $row3){
            ?>
            <tr>
                <td>
                  <div class="content">
                <div class="details">
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading"><?php echo $row3['fname']. " " . $row3['lname']; ?></h4>
                <p><?php echo $row2['comment']; ?></p>
                <hr>
            </div>
            
          </td>
            </tr>
            </tbody>
        </table>
        <?php
            }
          }

                
                }

            }
          // }
            ?>
            
      <form action="insert_comment.php" class="typing-area" autocomplete="off" method= "POST">
          <input type="text" name ="responder_id" value= "<?php echo $_SESSION['auth_user']['unique_id']; ?>" hidden>
          <input type="text" name ="commenter_id" value= "<?php echo $user_id; ?>" hidden>
          <input type="text" name ="aid" value= "<?php echo $sno; ?>" hidden>
        
        <!-- "input-field" -->
        <input type="text" name ="comment" class="input-field" placeholder="Post your comment here..." >
        <button class="btn btn-primary" name= "postbtn">post</button>
        
      </form>
    </section>
  </div>

  <script src="js/convo.js"></script>

</body>
</html>

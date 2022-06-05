<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include('admin/includes/config/dbconnect.php');
        $flag = false;
        $question_user_id = $_SESSION['auth_user']['unique_id'];
       
        $fpost = mysqli_real_escape_string($conn, $_POST['fpost']);

        $str_to_arr = explode(" ", $fpost);
        foreach($str_to_arr as $word){
            $sql = mysqli_query($conn, "SELECT * FROM `banned` WHERE `swearwords` LIKE '$word'");
            if(mysqli_num_rows($sql) > 0){
                $_SESSION['message'] = "Don't use offensive words!";
                $flag = true;
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                break;
            }
       }
       if($flag == false){
          $cpost = implode(" ", $str_to_arr);
          if(!empty($cpost)){
          $sql = mysqli_query($conn, "INSERT INTO questions (question_user_id, question) VALUES ({$question_user_id}, '{$cpost}')") or die();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
          }
       }

       

    }else{
        header("location: login.php");
    }
?>
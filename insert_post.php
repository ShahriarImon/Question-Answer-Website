<?php
    session_start();
    if(isset($_POST['postbtn'])){
        $flag = true;
        include('admin/includes/config/dbconnect.php');
        $questioner_id = mysqli_real_escape_string($conn, $_POST['questioner_id']);
        $responder_id = mysqli_real_escape_string($conn, $_POST['responder_id']);
        $post = mysqli_real_escape_string($conn, $_POST['post']);
        $qid = mysqli_real_escape_string($conn, $_POST['qid']);

        $str_to_arr = explode(" ", $post);
        foreach($str_to_arr as $word){
            $sql = mysqli_query($conn, "SELECT * FROM `banned` WHERE `swearwords` LIKE '$word'");
            if(mysqli_num_rows($sql) > 0){
                $_SESSION['message'] = "Don't use offensive words!";
                $flag = false;
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                break;
            }
       }

        if($flag == true){
            $cpost = implode(" ", $str_to_arr);
            if(!empty($cpost)){
                $sql = mysqli_query($conn, "INSERT INTO answers (question_id,questioner_id, responder_id, post) VALUES ({$qid}, {$questioner_id}, {$responder_id}, '{$post}')") or die();
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
         }

    //    if(!empty($post)){
            
    //         // $sql = "INSERT INTO `answers` (`questioner_id`, `responder_id`, `post`) VALUES ('$questioner_id', '$responder_id', '$post');";
    //         // $result = mysqli_query($conn, $sql);
    //         $sql = mysqli_query($conn, "INSERT INTO answers (questioner_id, responder_id, post) VALUES ({$questioner_id}, {$responder_id}, '{$post}')") or die();
    //    }

    }else{
        header("location: login.php");
    }
?>
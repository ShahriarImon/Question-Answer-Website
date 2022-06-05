<?php
include('includes/config/dbconnect.php');
include('authenticaion.php');

if(isset($_GET['answer_id']) && isset($_GET['answerno_id'])){
    $post_id = $_GET['answer_id'];
    $answerno = $_GET['answerno_id'];
    $sql = "DELETE FROM answers WHERE questioner_id = '$post_id' AND answerno = $answerno ";
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['message'] = "Answers deleted sucessfully";
        header('location: viewanswers.php');
        exit;
    }else{
        $_SESSION['message'] = "Something went wrong.!";
        header('location: viewanswers.php');
        exit;
    }
}
?>
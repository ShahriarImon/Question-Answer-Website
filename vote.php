<?php 
session_start();
if(isset($_POST['give_vote'])){
    include('admin/includes/config/dbconnect.php');

    $vote = $_POST['vote'];
    $answerno = $_POST['answerno'];
    
    $sql = "SELECT votecount FROM answers WHERE answerno = '$answerno' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $votecount = $row['votecount'];

    if($vote == '1'){
        $votecount = $votecount + 1;
        $sql2 = "UPDATE answers SET votecount = '$votecount' WHERE answerno = '$answerno' ";
        $result2 = mysqli_query($conn, $sql2);
    }else{
        $votecount = $votecount - 1;
        $sql2 = "UPDATE answers SET votecount = '$votecount' WHERE answerno = '$answerno' ";
        $result2 = mysqli_query($conn, $sql2);
    }

    if($result2){
        $_SESSION['message'] = "Voted sucessfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
?>
<?php
include('includes/config/dbconnect.php');
include('authenticaion.php');


// if(isset($_POST['update_status'])){
//     $user_id = $_POST['user_id'];
//     $status = $_POST['status'];
//     $sql = "UPDATE users SET `status` = '$status' WHERE unique_id = '$user_id' ";

//     $result = mysqli_query($conn, $sql);

//     if($result){
//         $_SESSION['message'] = "User's status changed sucessfully";
//         header('location: view_registers.php');
//         exit;
//     }else{
//         $_SESSION['message'] = "Something went wrong.!";
//         header('location: view_registers.php');
//         exit;
//     }
// }

if(isset($_POST['question_status_update'])){
    $user_id = $_POST['user_id'];
    $sno_id = $_POST['sno_id'];
    $status = $_POST['qstatus'];
    $sql = "UPDATE questions SET `qstatus` = '$status' WHERE question_user_id = '$user_id' AND questionno = '$sno_id'";

    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['message'] = "Question's status changed sucessfully";
        header('location: viewquestions.php');
        exit;
    }else{
        $_SESSION['message'] = "Something went wrong.!";
        header('location: viewquestions.php');
        exit;
    }
}

if(isset($_POST['answer_status_update'])){
    $user_id = $_POST['user_id'];
    $sno_id = $_POST['sno_id'];
    $status = $_POST['astatus'];
    $sql = "UPDATE answers SET `astatus` = '$status' WHERE questioner_id = '$user_id' AND answerno = '$sno_id' ";

    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['message'] = "Answer's status changed sucessfully";
        header('location: viewanswers.php');
        exit;
    }else{
        $_SESSION['message'] = "Something went wrong.!";
        header('location: viewanswers.php');
        exit;
    }
}

if(isset($_POST['user_delete'])){
    $user_id = $_POST['user_delete'];
    $sql = "DELETE FROM users WHERE unique_id = '$user_id' ";
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['message'] = "User/Admin deleted sucessfully";
        header('location: view_registers.php');
        exit;
    }else{
        $_SESSION['message'] = "Something went wrong.!";
        header('location: view_registers.php');
        exit;
    }
}


if(isset($_GET['user_id']) && isset($_GET['sno_id'])){
    $user_id = $_GET['user_id'];
    $sno = $_GET['sno_id'];
    $sql = "DELETE FROM questions WHERE question_user_id = '$user_id' AND questionno = $sno ";
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['message'] = "Question deleted sucessfully";
        header('location: viewquestions.php');
        exit;
    }else{
        $_SESSION['message'] = "Something went wrong.!";
        header('location: viewquestions.php');
        exit;
    }
}



if(isset($_POST['add_user'])){
    $username = $_POST['username'];
    // $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $role_as = $_POST['role_as'];
    $sql = "INSERT INTO users (username,fname,lname,email,role_as) VALUES ('$username','$fname','$lname','$email','$role_as')";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['message'] = "Admin/User added sucessfully";
        header('location: view_registers.php');
        exit;
    }else{
        $_SESSION['message'] = "Something went wrong.!";
        header('location: view_registers.php');
        exit;
    }
}

if(isset($_POST['update_user'])){

    $username = $_POST['username'];
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $role_as = $_POST['role_as'];
    
    $sql = "UPDATE users SET username = '$username', fname = '$fname', lname = '$lname', email = '$email', role_as = '$role_as' WHERE unique_id = '$user_id' ";
    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['message'] = "Updated sucessfully";
        header('location: view_registers.php');
        exit;
    }
}
?>
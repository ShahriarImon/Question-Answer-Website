<?php
    session_start();
    if(isset($_SESSION['auth']) && $_SESSION['auth'] == true){
    include('admin/includes/config/dbconnect.php');
    $sql = "SELECT * FROM users RIGHT JOIN questions ON users.unique_id = questions.question_user_id ORDER BY questionno DESC";
    $result = mysqli_query($conn, $sql);
    $output = "";

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $output .= '<a href="convo.php?user_id='.$row['unique_id'].'&sno_id='.$row['questionno'].'">
            <div class="content">
                <div class="details">
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading"><span>'.$row['fname'].' '.$row['lname'].'</span></h4>
                <p>'.$row['question'].'</p>
                <hr>
                <p class="mb-0"></p>
                
            </div>
            </a>';

        }
    }
    echo $output;
}
?>


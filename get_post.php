<?php
    
    // if($_SERVER["REQUEST_METHOD"]=="POST"){
    //     include('admin/includes/config/dbconnect.php');
    //     $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    //     $responder_id = mysqli_real_escape_string($conn, $_POST['responder_id']);
    //     $output = "";

    //    $sql = "SELECT * FROM answers LEFT JOIN users ON users.unique_id = answers.questioner_id WHERE questioner_id = $incoming_id ORDER BY answerno ASC";

    //     $result = mysqli_query($conn, $sql);

    //     if(mysqli_num_rows($result) > 0){
    //         while($row = mysqli_fetch_assoc($result)){
            
    //             $output .= '<div class="details">
    //                             <p>'.$row['post'].'</p>
    //                         </div>';
    //             echo $output;
    //     }


    // }

    // }else{
    //     header("location: login.php");
    // }

?>
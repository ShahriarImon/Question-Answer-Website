<?php 

include('includes/config/dbconnect.php');
include('authenticaion.php');
include('includes/header.php');


?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Users</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
    </ol>
    </ol>


    <div class="row">
    <div class="col-md-12">
        <div class="card" >
            <div class="card-header">
                <h4>Edit Approval Status</h4>
            </div>
            <div class="card-body">

            <?php 
                if(isset($_GET['user_id']) && isset($_GET['sno_id'])){
                    $user_id = $_GET['user_id'];
                    $sno = $_GET['sno_id'];
                
                    $sql = "SELECT * FROM questions where question_user_id = '$user_id' AND questionno = '$sno'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        foreach($result as $row){

                        
                    ?>

                    <form action="editcode.php" method ="POST">
                        <input type="hidden" name = "user_id" value = "<?=$row['question_user_id']; ?>">
                        <input type="hidden" name = "sno_id" value = "<?=$row['questionno']; ?>">
                        <div class="row">
                            
                            <div class="col-md-12 mb-3">
                                <label for="">Status</label>
                                <select name="qstatus" id="" value = "<?= $row['qstatus'] ?>" class="form-control">
                                    <option value="">--Select status--</option>
                                    <option value="1" <?= $row['qstatus'] == '1' ? 'selected':'' ?>>Approved</option>
                                    <option value="0" <?= $row['qstatus'] == '0' ? 'selected':'' ?>>Pending</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type = "submit" name = "question_status_update" class="btn btn-primary">Update Status</button>
                            </div>
                            
                        </div>
                    </form>
                         <div>
                            <a href="editcode.php?user_id=<?php echo $row['question_user_id'];?>&sno_id=<?php echo $row['questionno'];?>" class ="btn btn-danger" name = "question_delete">Delete</a>
                        </div>
                    <?php
                    }
                }else{

                    ?> 
                    <h4>No data found</h4>
                    <?php
                }
            }
            ?>
            </div>              
            
            </div>
        </div>
    
        </div>
    </div>
    
    <?php 
    include('includes/footer.php'); 
    include('includes/scripts.php'); 
    
    ?>
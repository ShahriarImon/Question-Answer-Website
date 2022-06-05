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
                
                    $sql = "SELECT * FROM answers where questioner_id = '$user_id' AND answerno = '$sno'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        foreach($result as $row){

                        
                    ?>

                    <form action="editcode.php" method ="POST">
                        <input type="hidden" name = "user_id" value = "<?=$row['questioner_id']; ?>">
                        <input type="hidden" name = "sno_id" value = "<?=$row['answerno']; ?>">
                        <div class="row">
                            
                            <div class="col-md-12 mb-3">
                                <label for=""><?= $row['post'] ?></label>
                                <select name="astatus" id="" value = "<?= $row['astatus'] ?>" class="form-control">
                                    <option value="">--Select status--</option>
                                    <option value="1" <?= $row['astatus'] == '1' ? 'selected':'' ?>>Approved</option>
                                    <option value="0" <?= $row['astatus'] == '0' ? 'selected':'' ?>>Pending</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type = "submit" name = "answer_status_update" class="btn btn-primary">Update Status</button>
                            </div>
                            
                        </div>
                    </form>
                        <div>
                            <a href="deletepost.php?answer_id=<?php echo $row['questioner_id'];?>&answerno_id=<?php echo $row['answerno'];?>" class ="btn btn-danger" name = "question_delete">Delete</a>
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
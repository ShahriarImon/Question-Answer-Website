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
                if(isset($_GET['user_id'])){
                    $user_id = $_GET['user_id'];
                
                    $sql = "SELECT * FROM users where unique_id = '$user_id'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        foreach($result as $row){

                        
                    ?>

                    <form action="editcode.php" method ="POST">
                        <input type="hidden" name = "user_id" value = "<?=$row['unique_id']; ?>">
                        <div class="row">
                            
                            <div class="col-md-12 mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" value = "<?= $row['status'] ?>" class="form-control">
                                    <option value="">--Select status--</option>
                                    <option value="1" <?= $row['status'] == '1' ? 'selected':'' ?>>Approved</option>
                                    <option value="0" <?= $row['status'] == '0' ? 'selected':'' ?>>Pending</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type = "submit" name = "update_status" class="btn btn-primary">Update Status</button>
                            </div>
                            
                        </div>
                    </form>
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
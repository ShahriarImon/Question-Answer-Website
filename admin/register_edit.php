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
                <h4>Edit Users</h4>
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
                                <label for="">Username</label>
                                <input type="text" name = "username" value = "<?= $row['username'] ?>"  class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">first Name</label>
                                <input type="text" name = "fname" value = "<?= $row['fname'] ?>" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">last Name</label>
                                <input type="text" name = "lname" value = "<?= $row['lname'] ?>" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Email</label>
                                <input type="email" name = "email" value = "<?= $row['email'] ?>" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Role as</label>
                                <select name="role_as" id="" value = "<?= $row['role_as'] ?>" class="form-control">
                                    <option value="">--Select Role--</option>
                                    <option value="1" <?= $row['role_as'] == '1' ? 'selected':'' ?>>Admin</option>
                                    <option value="0" <?= $row['role_as'] == '0' ? 'selected':'' ?>>User</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type = "submit" name = "update_user" class="btn btn-primary">Update User</button>
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
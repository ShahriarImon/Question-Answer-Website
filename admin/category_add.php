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
                    <h4>Add Category
                        <a href="category_view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                <form action="editcode.php" method ="POST">
                        
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Username</label>
                                <input type="text" name = "username" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">first Name</label>
                                <input type="text" name = "fname" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">last Name</label>
                                <input type="text" name = "lname" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Email</label>
                                <input type="email" name = "email" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Role as</label>
                                <select name="role_as" class="form-control">
                                    <option value="">--Select Role--</option>
                                    <option value="1" <?= $row['role_as'] == '1' ? 'selected':'' ?>>Admin</option>
                                    <option value="0" <?= $row['role_as'] == '0' ? 'selected':'' ?>>User</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type = "submit" name = "add_user" class="btn btn-primary">Add User/Admin</button>
                            </div>
                            
                        </div>
                    </form>      
                
                </div>              
            </div>
        </div>
    </div>
</div>
    <?php 
    include('includes/footer.php'); 
    include('includes/scripts.php'); 
    
 ?>
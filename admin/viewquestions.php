<?php 
include('includes/config/dbconnect.php');
include('authenticaion.php');
include('includes/header.php');
?>


<div class="container-fluid px-4">
    <h4 class="mt-4">Questions</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item">Questions</li>
    </ol>
    </ol>


    <div class="row">
    <div class="col-md-12">
        <?php include('message.php') ?>
        <div class="card">
            <div class="card-header">
                <h4>Users who have questions</h4>
                
            </div>
            <div class="card-body">
                <table class= "table table-bordered">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Questions</th>
                            <th>Approval status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?Php
                        $sql = "SELECT * FROM users RIGHT JOIN questions ON users.unique_id = questions.question_user_id";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            foreach($result as $row){
                                ?>
                                    <tr>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['fname']; ?></td>
                                        <td><?php echo $row['lname']; ?></td>
                                        <td><?php echo $row['question']; ?></td>

                                        <td><a href="questionsapproval.php?user_id=<?php echo $row['unique_id'];?>&sno_id=<?php echo $row['questionno'];?>" class ="btn btn-success"><?php if($row['qstatus'] == 1 ){
                                                echo 'Approved';
                                            }else{
                                                echo 'Pending';
                                            }?></a>
                                        </td>
                                        <td> 
                                       
                                        
  
                                    </tr>
                                <?php
                            }

                        }else{
                        ?>
                        <tr>
                            <td colspan='6'>No record found</td>
                        </tr> 
                        <?php 
                        }
                        ?>  
        
                  
                    </tbody>
                </table>

            </div>              
            
        </div>
    </div>

    </div>
</div>

<?php 
include('includes/footer.php'); 
include('includes/scripts.php'); 

?>
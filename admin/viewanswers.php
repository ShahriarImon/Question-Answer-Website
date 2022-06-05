<?php 
include('includes/config/dbconnect.php');
include('authenticaion.php');
include('includes/header.php');
?>


<div class="container-fluid px-4">
    <h4 class="mt-4">Answers</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item">Answers</li>
    </ol>
    </ol>


    <div class="row">
    <div class="col-md-12">
        <?php include('message.php') ?>
        <div class="card">
            <div class="card-header">
                <h4>Answers of questions</h4>
                
            </div>
            <div class="card-body">
                <table class= "table table-bordered">
                    <thead>
                        <tr>
                            <th>Answers</th>
                            <th>Approval status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?Php
                        $sql = "SELECT * FROM users RIGHT JOIN answers ON users.unique_id = answers.questioner_id";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            foreach($result as $row){
                                ?>
                                    <tr>
                                        <td><?php echo $row['post']; ?></td>

                                        <td><a href="answersapproval.php?user_id=<?php echo $row['unique_id'];?>&sno_id=<?php echo $row['answerno'];?>" class ="btn btn-success"><?php if($row['astatus'] == 1 ){
                                                echo 'Approved';
                                            }else{
                                                echo 'Pending';
                                            }?></a>
                                        
                                        
  
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
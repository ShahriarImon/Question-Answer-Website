<?php
if(isset($_SESSION['message'])){
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?php echo $_SESSION['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
      unset($_SESSION['message']); //For only 1 time successful confermation after signup
    }
?>


<?php 
session_start();
if(!isset($_SESSION['auth']) || $_SESSION['auth'] == false){
  header("location: ../login.php");
  exit;
}else{
    if($_SESSION['auth_role'] != '1'){
    header("location: ../login.php");
    exit;
    }
}
?>
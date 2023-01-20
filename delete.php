<?php
 session_start(); 
 include('empDB.php');
 // die;
     if(isset ($_GET['id'])){
     $updID = $_GET['id'];
     $currentTime = date('Y-m-d h:i:s', time());
     $DeletedBy = $_SESSION['name'];
 // var_dump($DeletedBy);
 // die;
 $update= "UPDATE users SET isDeleted= '1', isEnabled= '0', deleted_at= '$currentTime', deleted_by= '$DeletedBy' WHERE id= '$updID' ";
 $updateFire= mysqli_query($connections, $update);
 
 header("Location: all_employee.php");
 }
?>
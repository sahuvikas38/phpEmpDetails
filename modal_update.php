<?php
 include('empDB.php');
 
//  var_dump("viewQuery");
//  die;
 $viewID = $_GET['id'];
 $tableName = $_GET['tableName'];
 if($tableName == 'educational_details'){
     $viewQuery= "SELECT * FROM educational_details WHERE id= $viewID";
    
 } else {
    $viewQuery= "SELECT id, rating, remark FROM users WHERE id= $viewID";
 }
 $readFire= mysqli_query($connections, $viewQuery);
 
 $viewFetch= mysqli_fetch_array($readFire);
 echo json_encode($viewFetch);

?>
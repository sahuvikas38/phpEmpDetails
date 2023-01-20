<?php
 session_start();

 //DB_conection
 include 'empDB.php';
 // die;

  $idUpd = $_POST['myid'];
  $selectData = "SELECT * FROM users WHERE id=$idUpd";
  $SafeData = mysqli_query($connections, $selectData);
  $changes = mysqli_fetch_array($SafeData);

  if(isset($changes['name']) && $changes['name']!= ""){
  
     $nameUpd = $changes['name'];
     $emailUpd = $changes['emails'];
     $mobUpd = $changes['phone'];
     $roleUpd = $changes['user_role'];
     $fatherUpd = $changes['father_name'];
     $motherUpd = $changes['mother_name'];
     $fatherContactUpd = $changes['father_contact_number'];
     $presentAddUpd = $changes['present_address'];
     $cityUpd = $changes['city'];
     $pinCodeUpd = $changes['pin_code'];
     $perAddUpd = $changes['premanent_address'];
     $perCityUpd = $changes['permanent_city'];
     $perPinUpd = $changes['permanent_pincode'];
     $dobUpd = $changes['dob'];
     $altrConUpd = $changes['alternative_phone'];
     $dojUpd = $changes['date_of_joining'];
     $interviewDateUpd = $changes['interview_date'];
     $skillUpd = $changes['primary_skill'];
     $traingUpd = $changes['training_period'];
     $panUpd = $changes['pan'];
     $oldPanImage = $changes['pan_card_image'];
     $aadhaarNumUpd = $changes['aadhaar'];
     $oldAadhaarImage = $changes['aadhaar_card_image'];
     $oldProfileImage = $changes['profile_pic'];
     $bankNameUpd = $changes['bank_name'];
     $accNumUpd = $changes['account_number'];
     $ifscCodeUpd = $changes['ifsc_code'];
     $ratings = $changes['rating'];
     $remarks = $changes['remark'];
  
 }else{
     $nameUpd = '';
     $emailUpd = '';
     $mobUpd = '';
     $roleUpd = '';
     $fatherUpd = '';
     $motherUpd = '';
     $fatherContactUpd = '';
     $presentAddUpd = '';
     $cityUpd = '';
     $pinCodeUpd = '';
     $perAddUpd = '';
     $perCityUpd = '';
     $perPinUpd = '';
     $dobUpd = '';
     $skillUpd = '';
     $traingUpd = '';
     $altrConUpd = '';
     $dojUpd = '';
     $interviewDateUpd = '';
     $panUpd = '';
     $oldPanImage = '';
     $aadhaarNumUpd = '';
     $oldAadhaarImage = '';
     $oldProfileImage = '';
     $bankNameUpd = '';
     $accNumUpd = '';
     $ifscCodeUpd = '';
     $ratings = '';
     $remarks = '';
  }

  $upadtedBy = $_SESSION['id'];

 if ( isset($_POST['safePersonal'])) {  

    //  $idUpd = $_POST['myid'];
     $nameUpd = $_POST['Names'];
     $emailUpd = $_POST['EmailAdd'];
     $mobUpd = $_POST['mobile'];
     $roleUpd = $_POST['UsersRole'];
     $fatherUpd = $_POST['father'];
     $motherUpd = $_POST['mother'];
     $fatherContactUpd = $_POST['fatherContact'];
     $presentAddUpd = $_POST['presentAdd'];
     $cityUpd = $_POST['city'];
     $pinCodeUpd = $_POST['pinCode'];
     $perAddUpd = $_POST['parmanAdd'];
     $perCityUpd = $_POST['parmanCity'];
     $perPinUpd = $_POST['permanPin'];
     $dobUpd = $_POST['DOB'];
     $altrConUpd = $_POST['alternativeContact'];
     $dojUpd = $_POST['DOJ'];
     $interviewDateUpd = $_POST['interviewDate'];
     $skillUpd = $_POST['PrimarySkill'];
     $traingUpd = $_POST['trainingPeriod'];
     
    } else if (isset($_POST['safeDocument'])) {
    //  $idUpd = $_POST['myid'];
     $panUpd = $_POST['panNum'];
     $aadhaarNumUpd = $_POST['adhaarNum'];
     $bankNameUpd = $_POST['bankName'];
     $accNumUpd = $_POST['BankAccountNumber'];
     $ifscCodeUpd = $_POST['ifscCode'];
     echo $oldProfileImage = $_POST['oldProfileImage'];
     echo $oldAadhaarImage = $_POST['oldAadhaarImage'];
     echo $oldPanImage = $_POST['oldPanImage'];

    } else if (isset ($_POST['saveRatings'])){
      // $userId = $_POST['myid'];
      $ratings = $_POST['rating'];
      $remarks = $_POST['ratingRemark'];
    }
    
    $pan_file_name = $_FILES['panPic']['name'];
    if( $pan_file_name == ''){
      echo "1";
      $new_pan_File_Name = $oldPanImage;
    }else{
      echo "2";
      $pan_file_ext = (pathinfo($pan_file_name))["extension"];
      $pan_file_size = $_FILES['panPic']['size'];
      $pan_file_tmp = $_FILES['panPic']['tmp_name'];
      $pan_file_type = $_FILES['panPic']['type'];

     $new_pan_File_Name = "PAN_IMG_".date("Ymd_his").".".$pan_file_ext;
     unlink("upload_img/".$oldPanImage);
     move_uploaded_file($pan_file_tmp, "upload_img/".$new_pan_File_Name);
    }
    
    $aad_file_name = $_FILES['aadhaarPic']['name'];
    if( $aad_file_name == ''){
      echo "3";
      $new_aad_file_name = $oldAadhaarImage;
    }else{
      echo "4";
      $aad_file_ext = (pathinfo($aad_file_name))["extension"];
      $aad_file_size = $_FILES['aadhaarPic']['size'];
      $aad_file_tmp = $_FILES['aadhaarPic']['tmp_name'];
      $aad_file_type = $_FILES['aadhaarPic']['type'];
      
      $new_aad_file_name = "AAD_IMG_".date("Ymd_his").".".$aad_file_ext;
      unlink("upload_img/".$oldAadhaarImage);
      move_uploaded_file($aad_file_tmp, "upload_img/".$new_aad_file_name);
    }
    
    $pro_file_name= $_FILES['profilePic']['name'];
    if( $pro_file_name == ''){
      echo "5";
      $new_File_Name = $oldProfileImage;
    }else{ 
      echo "6";
      $pro_file_ext = (pathinfo($pro_file_name))["extension"];
      $pro_file_size = $_FILES['profilePic']['size'];
      $pro_file_tmp = $_FILES['profilePic']['tmp_name'];
      $pro_file_type = $_FILES['profilePic']['type'];
      
      
      $new_File_Name = "PRO_IMG_".date("Ymd_his").".".$pro_file_ext;
      unlink("upload_img/".$oldProfileImage);
      move_uploaded_file($pro_file_tmp, "upload_img/".$new_File_Name);
      
    }

   $update = "UPDATE users SET name= '$nameUpd', emails= '$emailUpd', phone= '$mobUpd', user_role= '$roleUpd',  father_name= '$fatherUpd', mother_name= '$motherUpd',  father_contact_number= '$fatherContactUpd', present_address=  '$presentAddUpd', city= '$cityUpd', pin_code= '$pinCodeUpd', premanent_address= '$perAddUpd', permanent_city=  '$perCityUpd', permanent_pincode= '$perPinUpd', dob= '$dobUpd', alternative_phone= '$altrConUpd', date_of_joining=  '$dojUpd', interview_date= '$interviewDateUpd', primary_skill= '$skillUpd', training_period= '$traingUpd', pan=  '$panUpd', pan_card_image= '$new_pan_File_Name', aadhaar= '$aadhaarNumUpd', aadhaar_card_image= '$new_aad_file_name',  profile_pic= '$new_File_Name', bank_name= '$bankNameUpd', account_number= '$accNumUpd', ifsc_code= '$ifscCodeUpd',  updated_by= '$upadtedBy', rating= '$ratings', remark= '$remarks' WHERE id = '$idUpd' ";
  
   $updateFire = mysqli_query($connections, $update);

    header("Location: index.php");

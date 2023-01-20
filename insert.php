<!-- Insert & Update Query For Education Tab -->
<?php
session_start();
include 'empDB.php';
// var_dump($_POST);
// die;
$user_id = $_POST['emp_Id'];
$recordExist = "SELECT id FROM educational_details WHERE user_id= $user_id";
$existFire = mysqli_query($connections, $recordExist);

  $qualification = $_POST['qualification'];
  $courses = $_POST['courses'];
  $institutes = $_POST['institutes'];
  $University_Board = $_POST['university_board'];
  $year_of_start = $_POST['year_of_start'];
  $year_of_passout = $_POST['year_of_passout'];
  $percentages = $_POST['percentages'];
  $oldMarksImage = $_POST['oldMarksImage'];
  $created_by = $_SESSION['id'];
  $updated_by = $_SESSION['id'];


  $marks_file_name = $_FILES['marksheetPhoto']['name'];
  if ($marks_file_name == '') {
  $new_marks_file_name = $oldMarksImage;
} else {
  $marks_file_ext = (pathinfo($marks_file_name))["extension"];
  $marks_file_size = $_FILES['marksheetPhoto']['size'];
  $marks_file_tmp = $_FILES['marksheetPhoto']['tmp_name'];
  $marks_file_type = $_FILES['marksheetPhoto']['type'];

  $new_marks_file_name = "MARKS_IMG_" . date("Ymd_his") . "." . $marks_file_ext;
  unlink("upload_img/" . $oldMarksImage);
  move_uploaded_file($marks_file_tmp, "upload_img/" . $new_marks_file_name);
}


if (isset($_POST['insertEdu'])) {

  $insert = " INSERT INTO educational_details (`user_id`, `qualification`, `course`, `institute`, `university_board`,  `year_start`, `year_end`, `percentage`, `marksheet_photo`, `created_by`) VALUES('$user_id', '$qualification',  '$courses', '$institutes', '$University_Board', '$year_of_start', '$year_of_passout', '$percentages',  '$new_marks_file_name', '$created_by') ";
  $CreateFire = mysqli_query($connections, $insert);
}
if (isset($_POST['updateEdu'])) {

  $educationUpdate = "UPDATE educational_details SET qualification= '$qualification', course= '$courses', institute=  '$institutes', university_board= '$University_Board', year_start= '$year_of_start', year_end= '$year_of_passout',  percentage= '$percentages', marksheet_photo= '$new_marks_file_name', updated_by = '$updated_by'  WHERE id = $user_id ";

  $CreateFire = mysqli_query($connections, $educationUpdate);
}

header("Location: edit.php");
?>
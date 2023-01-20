<?php session_start(); ?>

<!--DB_conection -->
<?php include 'empDB.php'; ?>
<?php

if (isset($_GET['id'])) {
    $viewID = $_GET['id'];
} else {
    $viewIDd = $_SESSION['id'];
}

$eduDetails = "SELECT * FROM educational_details WHERE user_id = $viewID ";
$userEduDetails = mysqli_query($connections, $eduDetails);

// print_r($eduDetails);
// die;
$viewQuery = "SELECT name, emails, phone, user_role, father_name, mother_name, father_contact_number, present_address, city, pin_code, premanent_address, permanent_city, permanent_pincode, dob, alternative_phone, date_of_joining, interview_date, training_period, primary_skill, pan, pan_card_image, aadhaar, aadhaar_card_image, profile_pic, bank_name, account_number,  ifsc_code, qualification, course, institute, university_board, year_start, year_end, percentage, marksheet_photo FROM users LEFT JOIN educational_details ON users.id = educational_details.user_id WHERE users.id= $viewID";
$readFire = mysqli_query($connections, $viewQuery);

$viewFetch = mysqli_fetch_array($readFire);

// Personal Details Tab Data.
$nameInp = $viewFetch['name'];
$emailInp = $viewFetch['emails'];
$mobileInp = $viewFetch['phone'];
$userInp = $viewFetch['user_role'];
$fatherInp = $viewFetch['father_name'];
$motherInp = $viewFetch['mother_name'];
$fatherContactInp = $viewFetch['father_contact_number'];
$presentAddInp = $viewFetch['present_address'];
$cityInp = $viewFetch['city'];
$pinInp = $viewFetch['pin_code'];
$pamanAddInp = $viewFetch['premanent_address'];
$paramnCityInp = $viewFetch['permanent_city'];
$paramanPinInp = $viewFetch['permanent_pincode'];
$dobInp = $viewFetch['dob'];
$altrConNumInp = $viewFetch['alternative_phone'];
$dojInp = $viewFetch['date_of_joining'];
$interviewDateInp = $viewFetch['interview_date'];
$trainingInp = $viewFetch['training_period'];
$skillInp = $viewFetch['primary_skill'];

// Educational Details Tab.
$qualificationInp = $viewFetch['qualification'];
$courseInp = $viewFetch['course'];
// var_dump($courseInp);
// die;
$instituteInp = $viewFetch['institute'];
$universBoardInp = $viewFetch['university_board'];
// var_dump($universBoardInp);
// die;
$yrStartInp = $viewFetch['year_start'];
$yrpassoutInp = $viewFetch['year_end'];
$percentageInp = $viewFetch['percentage'];
$MarksheetPicInp = $viewFetch['marksheet_photo'];

// Documents Tab Data.
$panNumInp = $viewFetch['pan'];
$panPicInp = $viewFetch['pan_card_image'];
$AadhaarNuminp = $viewFetch['aadhaar'];
$aadhaarPicInp = $viewFetch['aadhaar_card_image'];
$profileInp = $viewFetch['profile_pic'];
$bankNameInp = $viewFetch['bank_name'];
$accNumInp = $viewFetch['account_number'];
$ifscCodeInp = $viewFetch['ifsc_code'];
?>

<!-- Header -->
<?php include 'header.php'; ?>
<!-- End of Header -->

<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header border-bottom-0 pb-0">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personl" role="tab" aria-controls="personl" aria-selected="true"><b>Personal Details</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="educational-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false"><b>Education Details</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Doc-tab" data-toggle="tab" href="#document" role="tab" aria-controls="document" aria-selected="false"><b>Documemts</b></a>
                </li>
            </ul>
        </div>
        <div class="card-body border-bottom-primary">
            <div class="tab-content" id="myTabContent">

                <!-- Personal Detail Tab View -->
                <div class="tab-pane fade show active" id="personl" role="tabpanel" aria-labelledby="personal-tab">

                    <div class="row">
                        <div class="col-6">
                            <input type="hidden" id="" value="<?php echo $id ?>" name="myid">
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Name<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="text" class="form-control form-control" id="input-name" name="Names" readonly="readonly" value="<?php echo $nameInp ?>">
                                    <span class="spanTag" id="nameErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Email
                                        Address<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="input-email" name="EmailAdd" readonly="readonly" value="<?php echo $emailInp ?>">
                                    <span class="spanTag" id="emailErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Date of
                                        Birth<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="date" class="form-control" id="d-birth" name="DOB" readonly="readonly" value="<?php echo $dobInp ?>">
                                    <span class="spanTag" id="dobErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Phone
                                        No<i class="requiredStar">*</i></b></label>
                                <div class="col-10 ">
                                    <input type="number" class="form-control" name="mobile" id="input-mobile" readonly="readonly" value="<?php echo $mobileInp ?>">
                                    <span class="spanTag" id="mobErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Alternative
                                        Contact Number</b></label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="Alternative-Contact" name="alternativeContact" readonly="readonly" value="<?php echo $altrConNumInp ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Father
                                        Name<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="father-name" name="father" readonly="readonly" value="<?php echo $fatherInp ?>">
                                    <span class="spanTag" id="fatherNameErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Mother
                                        Name</b></label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="mother-name" name="mother" readonly="readonly" value="<?php echo $motherInp ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Father Contact Number<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="father-contact" name="fatherContact" readonly="readonly" value="<?php echo $fatherContactInp ?>">
                                    <span class="spanTag" id="fatherConErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Primary Skill<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="text" class="form-control " id="primary_skill" name="PrimarySkill" readonly="readonly" value="<?php echo $skillInp ?>">
                                    <span class="spanTag" id="skillErr"></span>
                                </div>
                            </div>

                                <div class="form-group">
                                    <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>User
                                            Role<i class="requiredStar">*</i></b></label>
                                    <div class="col-10">
                                        <select id="users-roles" class="form-control" aria-label="Default select example" name="UsersRole" readonly="readonly">
                                            <option value="disabled"></option>
                                            <option>Admin</option>
                                            <option>Employee</option>
                                        </select>
                                        <span class="spanTag" id="userErr"></span>
                                    </div>
                                </div>
                        </div>
                        <!-- 1st column End -->

                        <!-- 2nd column -->
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Present
                                        Address<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="present-address" name="presentAdd" readonly="readonly" value="<?php echo $presentAddInp ?>">
                                    <span class="spanTag" id="presAddErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Parmanent
                                        Address<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="Parmanent-add" name="parmanAdd" readonly="readonly" value="<?php echo $pamanAddInp ?>">
                                    <span class="spanTag" id="ParmAddErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>City<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="Cities" name="city" readonly="readonly" value="<?php echo $cityInp ?>">
                                    <span class="spanTag" id="cityErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Parmanent
                                        City<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="text" class="form-control inpuut-sm" size="10" id="Parmanent-city" name="parmanCity" readonly="readonly" value="<?php echo $paramnCityInp ?>">
                                    <span class="spanTag" id="parmCityErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Pin
                                        Code<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="Pin-Code" name="pinCode" readonly="readonly" value="<?php echo $pinInp ?>">
                                    <span class="spanTag" id="pinCodeErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Permanent PinCode<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="number" class="form-control" id="Permananent-Pin" name="permanPin" readonly="readonly" value="<?php echo $paramanPinInp ?>">
                                    <span class="spanTag" id="parmPinErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Date of
                                        Joining<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="date" class="form-control" id="Parmanent-doj" name="DOJ" readonly="readonly" value="<?php echo $dojInp ?>">
                                    <span class="spanTag" id="dojErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Interview Date<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="date" class="form-control" id="interview_date" name="interviewDate" readonly="readonly" value="<?php echo $interviewDateInp ?>">
                                    <span class="spanTag" id="interviewErr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Training Period<i class="requiredStar">*</i></b></label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="training_period" name="trainingPeriod" readonly="readonly" value="<?php echo $trainingInp ?>">
                                    <span class="spanTag" id="trainingErr"></span>
                                </div>
                            </div>
                            <!-- 2nd column End -->
                            <br>
                        </div>
                    </div>
                </div>

                <!-- Educational Tab -->
                <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="educational-tab">

                    <!-- Created a Table For Showing Data -->
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: auto;">Qualification</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: auto;">Uni/Board</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: auto;">Institute</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width:auto;">Course</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width:auto;">Percentage</th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width:auto;">Option</th>
                            </tr>
                        </thead>

                        <!-- Select Query For Showing Data in Tabel -->
                        <tbody>
                            <?php
                            $eduDetails = "SELECT * FROM educational_details WHERE user_id = $viewID ";
                            $userEduDetails = mysqli_query($connections, $eduDetails);
                            while ($rows = mysqli_fetch_array($userEduDetails)) { ?>

                                <tr>
                                    <td><?php echo $rows['qualification'] ?></td>
                                    <td><?php echo $rows['university_board'] ?></td>
                                    <td><?php echo $rows['institute'] ?></td>
                                    <td><?php echo $rows['course'] ?></td>
                                    <td><?php echo $rows['percentage'] ?></td>
                                    <td class="text-center">
                                        <button dataId="<?= $rows['id'] ?>" type="button" class="btn btn-primary btn-sm editModal"><i class="fas fa-sharp fa-solid fa-users-viewfinder"></i> View</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- End of Table -->
                </div>
                <!-- End of Educational Tab -->

                <!-- Modal For Add Details in Educational Tab. -->
                <div class="modal fade" id="targetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Employee Educational Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="eduModalClose">&times;</span>
                                </button>
                            </div>
                            <form action="insert.php" onsubmit="" method="POST">
                                <input type="hidden" id="qualification" name="qualification">
                                <input type="hidden" id="empId" name="emp_Id">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="col-12">
                                            <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>University / Board<i class="requiredStar">*</i></b></label>
                                            <input type="text" class="form-control" id="university_boards" name="university_board" placeholder="Enter University Name" value=""  readonly="readonly">
                                            <span class="spanTag" id="ubErr"></span>
                                        </div>
                                        <div class="col-12">
                                            <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Institute Name<i class="requiredStar">*</i></b></label>
                                            <input type="text" class="form-control" id="Institute-inp" name="institutes" placeholder="Enter Institute Name" value="" readonly="readonly">
                                            <span class="spanTag" id="instituteErr"></span>
                                        </div>
                                        <div class="col-12">
                                            <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Course<i class="requiredStar">*</i></b></label>
                                            <input type="text" class="form-control" id="Courses-inp" name="courses" placeholder="Enter Course Name" value="" readonly="readonly">
                                            <span class="spanTag" id="courseErr"></span>
                                        </div>
                                        <div class="col-12">
                                            <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Percentage<i class="requiredStar">*</i></b></label>
                                            <input type="text" class="form-control" id="percent" name="percentages" placeholder="Enter Percentage" value="" readonly="readonly">
                                            <span class="spanTag" id="percenErr"></span>
                                        </div>
                                    </div>

                                    <!-- row 2 -->
                                    <div class="col-6">
                                        <div class="col-12">
                                            <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Year of Start<i class="requiredStar">*</i></b></label>
                                            <input type="text" class="form-control" id="yr_of_start" name="year_of_start" placeholder="Enter Year of Start" value="" readonly="readonly">
                                            <span class="spanTag" id="passInErr"></span>
                                        </div>
                                        <div class="col-12">
                                            <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Year of End<i class="requiredStar">*</i></b></label>
                                            <input type="text" class="form-control" id="yr_of_end" name="year_of_passout" placeholder="Enter Year of Passout" value="" readonly="readonly">
                                            <span class="spanTag" id="passOutErr"></span>
                                        </div>
                                        <div class="col-12">
                                            <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b> Marksheet Photo<i class="requiredStar">*</i></b></label>
                                            <input class="form-control" type="text" id="marksheetImg" name="marksheetPhoto" multiple accept="image/png, image/jpg, image/jpeg" readonly="readonly">
                                            <input type="hidden" value= "" name= "oldMarksImage" id="oldMraksheetImageId">
                                            <img id="imageFileMarksheet" src="upload_img/<?php echo $MarksheetPicInp ?>" width="100">
                                            <span class="spanTag" id="MarksheetPicErr"></span>
                                        </div>
                                    </div>
                                    <!-- End of Row 2 -->
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary eduModalClose" data-dismiss="modal" name="closeEdu">Close</button>
                                </div>
                            </form>
                        </div>
                        <!-- End of Modal For Add Details in Educational Tab. -->
                    </div>
                </div>

                <!-- Document Tab -->
                <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="Doc-tab">
                    <form action="update.php" onsubmit="return validateformThird()" method="POST">
                        <input type="hidden" id="" value="<?php echo $id ?>" name="myid">
                        <div class="row">

                            <!-- Document Tab Column 1 -->
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="col-10">
                                        <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Pan Number<i class="requiredStar">*</i></b></label>
                                        <input type="text" class="form-control" id="pan-num" name="panNum" readonly="readonly" value="<?php echo $panNumInp ?>">
                                        <span class="spanTag" id="panNumErr"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-10">
                                        <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Pan Card<i class="requiredStar">*</i></b></label>
                                        <input class="form-control" type="text" id="Pan-photo" name="panPic" multiple accept="image/png, image/jpg, image/jpeg" value="<?php echo $panPicInp ?>" readonly="readonly">
                                        <img id="imageFile1" src="upload_img/<?php echo $panPicInp ?>" width="100">
                                        <span class="spanTag" id="PanPicErr"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-10">
                                        <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Aadhaar Number<i class="requiredStar">*</i></b></label>
                                        <input type="number" class="form-control" id="aadhaar-num" name="adhaarNum" readonly="readonly" value="<?php echo $AadhaarNuminp ?>">
                                        <span class="spanTag" id="aadhaarNumErr"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-10">
                                        <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Adhar Card<i class="requiredStar">*</i></b></label>
                                        <input class="form-control" type="text" id="AadhaarPhoto" name="aadhaarPic" multiple accept="image/png, image/jpg, image/jpeg" value="<?php echo $aadhaarPicInp ?>"readonly="readonly">
                                        <img id="imageFile2" src="upload_img/<?php echo $aadhaarPicInp ?>" width="100">
                                        <span class="spanTag" id="aadhaarPicErr"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Document Tab Column 1 -->

                            <!-- Document Tab Column 2 -->
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="col-10">
                                        <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Profile Pic<i class="requiredStar">*</i></b></label>
                                        <input class="form-control" type="text" id="ProfilPic" name="profilePic" multiple accept="image/png, image/jpg, image/jpeg" value="<?php echo $profileInp ?>" readonly="readonly">
                                        <img id="imageFile3" src="upload_img/<?php echo $profileInp ?>" width="100">
                                        <span class="spanTag" id="profilePicErr"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-10">
                                        <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Bank Name<i class="requiredStar">*</i></b></label>
                                        <input class="form-control" type="text" id="bank_name" name="bankName" value="<?php echo $bankNameInp ?>" readonly="readonly">
                                        <span class="spanTag" id="bankNameErr"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-10">
                                        <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Bank Account Number<i class="requiredStar">*</i></b></label>
                                        <input class="form-control" type="number" id="bank_acc" readonly="readonly" name="BankAccountNumber" value="<?php echo $accNumInp ?>">
                                        <span class="spanTag" id="bankAccErr"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-10">
                                        <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>IFSC Code<i class="requiredStar">*</i></b></label>
                                        <input class="form-control" type="text" id="ifsc_code" name="ifscCode" value="<?php echo $ifscCodeInp ?>" readonly="readonly">
                                        <span class="spanTag" id="ifscErr"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Document Tab Column 2 -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br>
        <!-- footer -->
        <?php include 'footer.php'; ?>
        <!-- End of Footer -->

     <script>
      $('#dataTable').dataTable({
       searching: false,
       paging: false,
       info: false
      });


      // Edit Button Funtionality To Show Modal.
      $('.editModal').on('click', function() {
          $('.saveUpadteBtn').attr("name", 'updateEdu');
          var dataId = $(this).attr('dataId');
          console.log(dataId)

          $.ajax({
              url: 'modal_update.php',
              method: 'GET',
              data: {
                  'id': dataId
              },
              dataType: 'json',
              success: function(response) {
                  console.log(response);
                 // Using JQuery To Show Data In Modal When Edit Button Click.
                  $('#university_boards').val(response.university_board);
                  $('#Institute-inp').val(response.institute);
                  $('#Courses-inp').val(response.course);
                  $('#percent').val(response.percentage);
                  $('#yr_of_start').val(response.year_start);
                  $('#yr_of_end').val(response.year_end);

                  var imgName = response.marksheet_photo;
                  $('#oldMraksheetImageId').val(imgName);
                  $('#imageFileMarksheet').attr("src", "upload_img/"+imgName);
              }
          });

          $('#targetModal').modal('show');
      });

          //  using JavaScript for TenthPrew image.
          $(document).on('change', '#marksheetImg', function(event) {
          // console.log();
          var imagepreview = URL.createObjectURL(event.target.files[0]);
          //  console.log();
          document.getElementById("imageFileMarksheet").src = imagepreview;
          document.getElementById("imageFileMarksheet").width = "100";
          document.getElementById("imageFileMarksheet").height = "100";
      })

          //  using JavaScript for PanPrew image.
          $(document).on('change', '#Pan-photo', function(event) {
          // console.log();
          var imagepreview = URL.createObjectURL(event.target.files[0]);
          //  console.log();
          document.getElementById("imageFile1").src = imagepreview;
          document.getElementById("imageFile1").width = "100";
          document.getElementById("imageFile1").height = "100";
      })

      //  using JavaScript for AadhaarPrew image.
      $(document).on('change', '#AadhaarPhoto', function(event) {
          // console.log();
          var imagepreview = URL.createObjectURL(event.target.files[0]);
          //  console.log();
          document.getElementById("imageFile2").src = imagepreview;
          document.getElementById("imageFile2").width = "100";
          document.getElementById("imageFile2").height = "100";
      })

      //  using JavaScript for ProfilePrew image.
      $(document).on('change', '#ProfilPic', function(event) {
          // console.log();
          var imagepreview = URL.createObjectURL(event.target.files[0]);
          //  console.log();
          document.getElementById("imageFile3").src = imagepreview;
          document.getElementById("imageFile3").width = "100";
          document.getElementById("imageFile3").height = "100";
      })
     </script>
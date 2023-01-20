  <!-- Session_Start -->
  <?php session_start(); ?>

  <!--DB_conection -->
  <?php include 'empDB.php'; ?>

  <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = $_SESSION['id'];
    }

    $eduDetails = "SELECT * FROM educational_details WHERE user_id = $id ";
    $userEduDetails = mysqli_query($connections, $eduDetails);
    $selectData = "SELECT name, emails, phone, user_role, father_name, mother_name, father_contact_number, present_address, city, pin_code, premanent_address, permanent_city, permanent_pincode, dob, alternative_phone, date_of_joining, interview_date, training_period, primary_skill, pan, pan_card_image, aadhaar, aadhaar_card_image, profile_pic, bank_name, account_number,  ifsc_code, qualification, course, institute, university_board, year_start, year_end, percentage, marksheet_photo FROM users LEFT JOIN educational_details ON users.id = educational_details.user_id WHERE users.id= $id";

    $SafeData = mysqli_query($connections, $selectData);
    $changes = mysqli_fetch_array($SafeData);

    // Personal Details Tab Data.
    $nameInp = $changes['name'];
    $emailInp = $changes['emails'];
    $mobileInp = $changes['phone'];
    $userInp = $changes['user_role'];
    $fatherInp = $changes['father_name'];
    $motherInp = $changes['mother_name'];
    $fatherContactInp = $changes['father_contact_number'];
    $presentAddInp = $changes['present_address'];
    $cityInp = $changes['city'];
    $pinInp = $changes['pin_code'];
    $pamanAddInp = $changes['premanent_address'];
    $paramnCityInp = $changes['permanent_city'];
    $paramanPinInp = $changes['permanent_pincode'];
    $dobInp = $changes['dob'];
    $altrConNumInp = $changes['alternative_phone'];
    $dojInp = $changes['date_of_joining'];
    $interviewDateInp = $changes['interview_date'];
    $trainingInp = $changes['training_period'];
    $skillInp = $changes['primary_skill'];

    // Educational Details Tab.
    $qualificationInp = $changes['qualification'];
    $courseInp = $changes['course'];
    $instituteInp = $changes['institute'];
    $universBoardInp = $changes['university_board'];
    $yrStartInp = $changes['year_start'];
    $yrpassoutInp = $changes['year_end'];
    $percentageInp = $changes['percentage'];
    $MarksheetPicInp = $changes['marksheet_photo'];

    // Documents Tab Data.
    $panNumInp = $changes['pan'];
    $panPicInp = $changes['pan_card_image'];
    $AadhaarNuminp = $changes['aadhaar'];
    $aadhaarPicInp = $changes['aadhaar_card_image'];
    $profileInp = $changes['profile_pic'];   
    $bankNameInp = $changes['bank_name'];
    $accNumInp = $changes['account_number'];
    $ifscCodeInp = $changes['ifsc_code'];

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

                  <!-- Personal Details Tab -->
                  <div class="tab-pane fade show active" id="personl" role="tabpanel" aria-labelledby="personal-tab">
                      <form action="update.php" onsubmit="return validateformOne()" method="POST">
                          <div class="row" id="update-tab">
                              <!-- 1st Coloumn -->
                              <div class="col-6">
                                  <input type="hidden" id="" value="<?php echo $id ?>" name="myid">
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Name<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="text" class="form-control form-control" id="input-name" name="Names" placeholder="Enter Name" value="<?php echo $nameInp ?>">
                                          <span class="spanTag" id="nameErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Email
                                              Address<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="text" class="form-control" id="input-email" name="EmailAdd" placeholder="Email Address" value="<?php echo $emailInp ?>">
                                          <span class="spanTag" id="emailErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Date of
                                              Birth<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="date" class="form-control" id="d-birth" name="DOB" placeholder="Enter DOB" value="<?php echo $dobInp ?>">
                                          <span class="spanTag" id="dobErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Phone
                                              No<i class="requiredStar">*</i></b></label>
                                      <div class="col-10 ">
                                          <input type="number" class="form-control" name="mobile" id="input-mobile" placeholder="Enter Phone no" value="<?php echo $mobileInp ?>">
                                          <span class="spanTag" id="mobErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Alternative
                                              Contact Number</b></label>
                                      <div class="col-10">
                                          <input type="number" class="form-control" id="Alternative-Contact" name="alternativeContact" placeholder="Enetr Alternative Phone Number" value="<?php echo $altrConNumInp ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Father
                                              Name<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="text" class="form-control" id="father-name" name="father" placeholder="Enter Father Name" value="<?php echo $fatherInp ?>">
                                          <span class="spanTag" id="fatherNameErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Mother
                                              Name</b></label>
                                      <div class="col-10">
                                          <input type="text" class="form-control" id="mother-name" name="mother" placeholder="Enter Mother Name" value="<?php echo $motherInp ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Father Contact Number<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="text" class="form-control" id="father-contact" name="fatherContact" placeholder="Enter Father Contact Number" value="<?php echo $fatherContactInp ?>">
                                          <span class="spanTag" id="fatherConErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Primary Skill<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="text" class="form-control " id="primary_skill" name="PrimarySkill" placeholder="Enter Primary Skill" value="<?php echo $skillInp ?>">
                                          <span class="spanTag" id="skillErr"></span>
                                      </div>
                                  </div>

                                  <?php if ($userInp == 1) { ?>
                                      <div class="form-group">
                                          <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>User
                                                  Role<i class="requiredStar">*</i></b></label>
                                          <div class="col-10">
                                              <select id="users-roles" class="form-control" aria-label="Default select example" name="UsersRole">
                                                  <option></option>

                                                  <option <?php if ($userInp === "1") {
                                                                echo ("selected");
                                                            } ?> value="1">Admin</option>

                                                  <option <?php if ($userInp === "2") {
                                                                echo ("selected");
                                                            } ?> value="2">Employee</option>
                                              </select>
                                              <span class="spanTag" id="userErr"></span>
                                          </div>
                                      </div>
                                  <?php } ?>
                              </div>
                              <!-- 1st column End -->

                              <!-- 2nd column -->
                              <div class="col-6">
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Present
                                              Address<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="text" class="form-control" id="present-address" name="presentAdd" placeholder="Enter Present Address" value="<?php echo $presentAddInp ?>">
                                          <span class="spanTag" id="presAddErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Parmanent
                                              Address<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="text" class="form-control" id="Parmanent-add" name="parmanAdd" placeholder="Enter Parmanent Address" value="<?php echo $pamanAddInp ?>">
                                          <span class="spanTag" id="ParmAddErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>City<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="text" class="form-control" id="Cities" name="city" placeholder="Enter City" value="<?php echo $cityInp ?>">
                                          <span class="spanTag" id="cityErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Parmanent
                                              City<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="text" class="form-control inpuut-sm" size="10" id="Parmanent-city" name="parmanCity" placeholder="Enter Parmanent Address" value="<?php echo $paramnCityInp ?>">
                                          <span class="spanTag" id="parmCityErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Pin
                                              Code<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="number" class="form-control" id="Pin-Code" name="pinCode" placeholder="Enter Pin Code" value="<?php echo $pinInp ?>">
                                          <span class="spanTag" id="pinCodeErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Permanent PinCode<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="number" class="form-control" id="Permananent-Pin" name="permanPin" placeholder="Enter Permanent Pin Code" value="<?php echo $paramanPinInp ?>">
                                          <span class="spanTag" id="parmPinErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Date of
                                              Joining<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="date" class="form-control" id="Parmanent-doj" name="DOJ" placeholder="Enter Date of Joining" value="<?php echo $dojInp ?>">
                                          <span class="spanTag" id="dojErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Interview Date<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="date" class="form-control" id="interview_date" name="interviewDate" placeholder="Enter Interview Date" value="<?php echo $interviewDateInp ?>">
                                          <span class="spanTag" id="interviewErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Training Period<i class="requiredStar">*</i></b></label>
                                      <div class="col-10">
                                          <input type="text" class="form-control" id="training_period" name="trainingPeriod" placeholder="Enter Training Period" value="<?php echo $trainingInp ?>">
                                          <span class="spanTag" id="trainingErr"></span>
                                      </div>
                                  </div>
                                  <!-- 2nd column End -->
                                  <br>
                              </div>
                          </div>
                          <div class="row" style="text-align: end;">
                              <div class="col-6"></div>
                              <div class="col-5">
                                  <button class="btn btn-primary btn-sm btn-block" name="safePersonal"><i class="fas fa-solid fa-download"></i>
                                      Save as Draft
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
                  <!-- End of Personal Details Tab -->

                  <!-- Educational Tab -->
                  <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="educational-tab">

                      <input type="hidden" id="empEduId" value="<?php echo $id ?>" name="myid">
                      <div class="col-10">
                          <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Qualification<i class="requiredStar">*</i></b></label>
                          <div class="row">
                              <div class="col-8">
                                  <select id="select_quali" class="form-control" aria-label="Default select example" name="qulaifications">
                                      <option value=""></option>
                                      <?php
                                        $existingRow = ["10", "12", "Diploma", "Under-Graduate", "Post-Graduate"];
                                        $newArray = [];

                                        while ($rowsData = mysqli_fetch_array($userEduDetails)) {

                                            if (($key = array_search($rowsData["qualification"], $existingRow)) !== false) {
                                                unset($existingRow[$key]);
                                            }
                                        }
                                        foreach ($existingRow as $value) { ?>
                                          <option value="<?= $value ?>"> <?= $value ?></option>

                                      <?php } ?>
                                  </select>
                                  <span class="spanTag" id="qualificationErr"></span>
                              </div>
                              <div class="col-4">
                                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#targetModal" value="" id="addDetails">Add Details</button>
                              </div>
                          </div>
                      </div>
                      <br>

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
                                $eduDetails = "SELECT * FROM educational_details WHERE user_id = $id ";
                                $userEduDetails = mysqli_query($connections, $eduDetails);
                                while ($rows = mysqli_fetch_array($userEduDetails)) { ?>

                                  <tr>
                                      <td><?php echo $rows['qualification'] ?></td>
                                      <td><?php echo $rows['university_board'] ?></td>
                                      <td><?php echo $rows['institute'] ?></td>
                                      <td><?php echo $rows['course'] ?></td>
                                      <td><?php echo $rows['percentage'] ?></td>
                                      <td class="text-center">
                                          <button dataId="<?= $rows['id'] ?>" type="button" class="btn btn-primary btn-sm editModal" ><i class="fas fa-solid fa-user-pen"></i> Edit</button>
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
                                  <h5 class="modal-title" id="exampleModalLabel">Employee Educational Data</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true" class="eduModalClose">&times;</span>
                                  </button>
                              </div>
                              <form action="insert.php" onsubmit="return validateformSec()" method="POST" enctype="multipart/form-data">
                                  <input type="hidden" id="qualification" name="qualification" value="">
                                  <input type="hidden" id="empId" name="emp_Id">
                                  <div class="row">
                                      <div class="col-6">
                                          <div class="col-12">
                                              <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>University / Board<i class="requiredStar">*</i></b></label>
                                              <input type="text" class="form-control" id="university_boards" name="university_board" placeholder="Enter University Name" value="">
                                              <span class="spanTag" id="ubErr"></span>
                                          </div>
                                          <div class="col-12">
                                              <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Institute Name<i class="requiredStar">*</i></b></label>
                                              <input type="text" class="form-control" id="Institute-inp" name="institutes" placeholder="Enter Institute Name">
                                              <span class="spanTag" id="instituteErr"></span>
                                          </div>
                                          <div class="col-12">
                                              <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Course<i class="requiredStar">*</i></b></label>
                                              <input type="text" class="form-control" id="Courses-inp" name="courses" placeholder="Enter Course Name" value="">
                                              <span class="spanTag" id="courseErr"></span>
                                          </div>
                                          <div class="col-12">
                                              <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Percentage<i class="requiredStar">*</i></b></label>
                                              <input type="text" class="form-control" id="percent" name="percentages" placeholder="Enter Percentage" value="">
                                              <span class="spanTag" id="percenErr"></span>
                                          </div>
                                      </div>

                                      <!-- row 2 -->
                                      <div class="col-6">
                                          <div class="col-12">
                                              <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Year of Start<i class="requiredStar">*</i></b></label>
                                              <input type="text" class="form-control" id="yr_of_start" name="year_of_start" placeholder="Enter Year of Start" value="">
                                              <span class="spanTag" id="passInErr"></span>
                                          </div>
                                          <div class="col-12">
                                              <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Year of End<i class="requiredStar">*</i></b></label>
                                              <input type="text" class="form-control" id="yr_of_end" name="year_of_passout" placeholder="Enter Year of Passout" value="">
                                              <span class="spanTag" id="passOutErr"></span>
                                          </div>
                                          <div class="col-12">
                                              <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b> Marksheet Photo<i class="requiredStar">*</i></b></label>
                                              <input class="form-control" type="file" id="marksheetImg" name="marksheetPhoto" multiple accept="image/png, image/jpg, image/jpeg">
                                              <input type="hidden" value= "" name= "oldMarksImage" id="oldMraksheetImageId">
                                              <img id="imageFileMarksheet" src="upload_img/<?php echo $MarksheetPicInp ?>" width="100">
                                              <span class="spanTag" id="MarksheetPicErr"></span>
                                          </div>
                                      </div>
                                      <!-- End of Row 2 -->
                                  </div>
                                  <br>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-sm btn-primary saveUpadteBtn" name="insertEdu">Save</button>
                                      <button type="button" class="btn btn-sm btn-secondary eduModalClose" data-dismiss="modal" name="closeEdu">Close</button>
                                  </div>
                              </form>
                          </div>
                          <!-- End of Modal For Add Details in Educational Tab. -->
                      </div>
                  </div>

                  <!-- Document Tab -->
                  <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="Doc-tab">
                      <form action="update.php" onsubmit="return validateformThird()" method="POST" enctype="multipart/form-data">
                          <input type="hidden" id="" value="<?php echo $id ?>" name="myid">
                          <div class="row">

                              <!-- Document Tab Column 1 -->
                              <div class="col-6">
                                  <div class="form-group">
                                      <div class="col-10">
                                          <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Pan Number<i class="requiredStar">*</i></b></label>
                                          <input type="text" class="form-control" id="pan-num" name="panNum" placeholder="Enter Pan Number" value="<?php echo $panNumInp ?>">
                                          <span class="spanTag" id="panNumErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-10">
                                          <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Pan Card<i class="requiredStar">*</i></b></label>
                                          <input class="form-control" type="file" id="Pan-photo" name="panPic" multiple accept="image/png, image/jpg, image/jpeg">
                                          <input type="hidden" value= <?php echo $panPicInp; ?> name= "oldPanImage">
                                          <img id="imageFile1" src="upload_img/<?php echo $panPicInp ?>" width="100">
                                          <span class="spanTag" id="PanPicErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-10">
                                          <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Aadhaar Number<i class="requiredStar">*</i></b></label>
                                          <input type="number" class="form-control" id="aadhaar-num" name="adhaarNum" placeholder="Enter Aadhaar Number" value="<?php echo $AadhaarNuminp; ?>">
                                          <span class="spanTag" id="aadhaarNumErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-10">
                                          <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Adhar Card<i class="requiredStar">*</i></b></label>
                                          <input class="form-control" type="file" id="AadhaarPhoto" name="aadhaarPic" multiple accept="image/png, image/jpg, image/jpeg">
                                          <input type="hidden" value= <?php echo $aadhaarPicInp; ?> name= "oldAadhaarImage">
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
                                          <input class="form-control" type="file" id="ProfilPic" name="profilePic" multiple accept="image/png, image/jpg, image/jpeg">
                                          <input type="hidden" value= <?php echo $profileInp; ?> name= "oldProfileImage">
                                          <img id="imageFile3" src="upload_img/<?php echo $profileInp ?>" width="100">
                                          <span class="spanTag" id="profilePicErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-10">
                                          <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Bank Name<i class="requiredStar">*</i></b></label>
                                          <input class="form-control" type="text" id="bank_name" name="bankName" value="<?php echo $bankNameInp ?>" placeholder="Enter Bank Name">
                                          <span class="spanTag" id="bankNameErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-10">
                                          <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Bank Account Number<i class="requiredStar">*</i></b></label>
                                          <input class="form-control" type="number" id="bank_acc" placeholder="Enter Bank Account Number" name="BankAccountNumber" value="<?php echo $accNumInp ?>">
                                          <span class="spanTag" id="bankAccErr"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-10">
                                          <label class="col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>IFSC Code<i class="requiredStar">*</i></b></label>
                                          <input class="form-control" type="text" id="ifsc_code" name="ifscCode" value="<?php echo $ifscCodeInp ?>" placeholder="Enter IFSC Code">
                                          <span class="spanTag" id="ifscErr"></span>
                                      </div>
                                  </div>
                              </div>
                              <!-- End of Document Tab Column 2 -->
                              <br>
                              <div class="pull-right col-5">
                                  <button class="btn btn-primary btn-sm btn-block" name="safeDocument"><i class="fas fa-solid fa-download"></i>
                                      Safe as Draft
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
                  <!-- End of Document Tab -->
              </div>
          </div>
      </div>
  </div>

  <!-- footer -->
  <?php include 'footer.php'; ?>
  <!-- End of Footer -->

  <script>
      // Quaification Coloumn Error Setup.
      $('#addDetails').on("click", function() {

          let selectvalue = $('#select_quali').val();
          var empId = $('#empEduId').val();
        //   console.log(selectvalue);

          if (selectvalue == "") {
              seterror("#qualificationErr", "**Please Select Your Qualification ");
              console.log(selectvalue);
              return false;
          } else {
              clearerrorsQualification();
              $('#qualification').val(selectvalue);
              $('#empId').val(empId);
              return true;
          }
      });

      function clearerrorsQualification() {
          $("#qualificationErr").hide();
      }

      function seterror(id, message) {
          $(id).text(message);
          $(id).show();
      }
      // End Of Quaification Coloumn Error Setup.

      // Edit Button Funtionality To Show Modal.
      $('.editModal').on('click', function() {
          $('.saveUpadteBtn').attr("name", 'updateEdu');
          var dataId = $(this).attr('dataId');
        //   console.log(dataId)
          $.ajax({
              url: 'modal_update.php',
              method: 'GET',
              data: {
                  'id': dataId,
                   'tableName': "educational_details" 
              },
              dataType: 'json',
              success: function(response) {
                  console.log(response);
                 // Using JQuery To Show Data In Modal When Edit Button Click.
                  $('#empId').val(response.id);
                  $('#qualification').val(response.qualification);
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

      // Using JQuery To Clear Show Data In Modal When AddDetails Button Click.
      $(document).ready(function() {
          $("#addDetails").click(function() {
              $('#university_boards').val('');
              $('#Institute-inp').val('');
              $('#Courses-inp').val('');
              $('#percent').val('');
              $('#yr_of_start').val('');
              $('#yr_of_end').val('');
              $('#marksheetImg').val('');
          })
      });

      $('.eduModalClose').on('click', function() {
          $('.saveUpadteBtn').attr("name", 'insertEdu');
      });

      $('#dataTable').dataTable({
          searching: false,
          paging: false,
          info: false
      });
      //  End of Edit Button Funtionality To Show Modal.

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

      // Validation For Personal Details tab.
      function validateformOne() {
          countErr = 0;
          clearerrorsPersonal();
          var inputName = $.trim($('#input-name').val());
          var inputeEmails = $.trim($('#input-email').val());
          var inputDob = $('#d-birth').val();
          var inputMob = $('#input-mobile').val();
          var inputFather = $.trim($('#father-name').val());
          var inputFatherCont = $('#father-contact').val();
          var inputPimarySkill = $('#primary_skill').val();
          var inputTrainingPeriod = $('#training_period').val();
          var inputPresAdd = $.trim($('#present-address').val());
          var inputParmAdd = $.trim($('#Parmanent-add').val());
          var inputCity = $.trim($('#Cities').val());
          var inputParmCity = $.trim($('#Parmanent-city').val());
          var inputPincode = $.trim($('#Pin-Code').val());
          var inputParmPin = $.trim($('#Permananent-Pin').val());
          var inputParmDoj = $('#Parmanent-doj').val();
          var inputInterview = $('#interview_date').val();
          var inputusrRole = $('#users-roles').val();

          //  Using Regex for Valid_information.
          var regxemail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          var regxphone = /^[6789][0-9]{9}$/;
          var regxname = /^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
          var regxpincode = /^[1-9][0-9]{5}$/;


          if (inputName == "" || inputName == null) {
              seterror("#nameErr", "**Please Fill Name ");
              countErr++;
          } else if (!regxname.test(inputName)) {
              seterror("#nameErr", "**Please Enter Valid Name");
              countErr++;
          }
          if (inputeEmails == "" || inputeEmails == null) {
              seterror("#emailErr", "**Please Fill Email ");
              countErr++;
          } else if (!regxemail.test(inputeEmails)) {
              seterror("#emailErr", "**Please Enter Valid Email-Address");
              countErr++;
          }
          if (inputDob == "" || inputDob == null) {
              seterror("#dobErr", "**Please Fill Date of Birth ");
              countErr++;
          }
          if (inputMob == "" || inputMob == null) {
              seterror("#mobErr", "**Please Fill Phone No ");
              countErr++;
          } else if (!regxphone.test(inputMob)) {
              seterror("#mobErr", "**Please Enter Valid Phone No");
              countErr++;
          }
          if (inputFather == "" || inputFather == null) {
              seterror("#fatherNameErr", "**Please Fill Father Name ");
              countErr++;
          } else if (!regxname.test(inputFather)) {
              seterror("#fatherNameErr", "**Please Enter Valid Name");
              countErr++;
          }
          if (inputFatherCont == "" || inputFatherCont == null) {
              seterror("#fatherConErr", "**Please Fill Father Conatct number ");
              countErr++;
          } else if (!regxphone.test(inputFatherCont)) {
              seterror("#fatherConErr", "**Please Enter Valid Phone No");
              countErr++;
          }
          if (inputPimarySkill == "" || inputPimarySkill == null) {
              seterror("#skillErr", "**Please Fill Primary Skill ");
              countErr++;
          }
          if (inputTrainingPeriod == "" || inputTrainingPeriod == null) {
              seterror("#trainingErr", "**Please Fill Training Period ");
              countErr++;
          }
          if (inputPresAdd == "" || inputPresAdd == null) {
              seterror("#presAddErr", "**Please Fill Present Address ");
              countErr++;
          }
          if (inputParmAdd == "" || inputParmAdd == null) {
              seterror("#ParmAddErr", "**Please Fill Parmanent Address ");
              countErr++;
          }
          if (inputCity == "" || inputCity == null) {
              seterror("#cityErr", "**Please Fill City Name ");
              countErr++;
          }
          if (inputParmCity == "" || inputParmCity == null) {
              seterror("#parmCityErr", "**Please Fill Parmanent City Name");
              countErr++;
          }
          if (inputPincode == "" || inputPincode == null) {
              seterror("#pinCodeErr", "**Please Fill Pin Code ");
              countErr++;
          } else if (!regxpincode.test(inputPincode)) {
              seterror("#pinCodeErr", "**Please Enter Valid Pin Code");
              countErr++;
          }
          if (inputParmPin == "" || inputParmPin == null) {
              seterror("#parmPinErr", "**Please Fill Parmanent Pin Code ");
              countErr++;
          } else if (!regxpincode.test(inputParmPin)) {
              seterror("#parmPinErr", "**Please Enter Valid Pin Code");
              countErr++;
          }
          if (inputParmDoj == "" || inputParmDoj == null) {
              seterror("#dojErr", "**Please Fill Date of Joining ");
              countErr++;
          }
          if (inputInterview == "" || inputInterview == null) {
              seterror("#interviewErr", "**Please Fill Date of Interview ");
              countErr++;
          }
          if (inputusrRole == "" || inputusrRole == null) {
              seterror("#userErr", "**Please Fill User Role ");
              countErr++;
          }

          console.log(countErr);
          if (countErr > 0) {
              return false;
          } else {
              return true;
          }
      }

      function clearerrorsPersonal() {
          $("#nameErr").hide();
          $("#emailErr").hide();
          $("#dobErr").hide();
          $("#mobErr").hide();
          $("#fatherNameErr").hide();
          $("#fatherConErr").hide();
          $("#skillErr").hide();
          $("#trainingErr").hide();
          $("#presAddErr").hide();
          $("#ParmAddErr").hide();
          $("#cityErr").hide();
          $("#parmCityErr").hide();
          $("#pinCodeErr").hide();
          $("#parmPinErr").hide();
          $("#dojErr").hide();
          $("#interviewErr").hide();
          $("#userErr").hide();
      }

      function seterror(id, message) {
          $(id).text(message);
          $(id).show();
      }

      // Validation For Educational Details tab. 

      function validateformSec() {
          countErr = 0;
          clearerrorsEducation();

          var inputeCorse = $('#Courses-inp').val();
          var inputInstit = $('#Institute-inp').val();
          var inputU_b = $('#university_boards').val();
          var inputyr_passIn = $('#yr_of_start').val();
          var inputyr_passOut = $('#yr_of_end').val();
          var inputPercent = $('#percent').val();


          if (inputeCorse == "" || inputeCorse == null) {
              seterror("#courseErr", "**Please Write Course ");
              countErr++;
          }
          if (inputInstit == "" || inputInstit == null) {
              seterror("#instituteErr", "**Please Select Institute ");
              countErr++;
          }
          if (inputU_b == "" || inputU_b == null) {
              seterror("#ubErr", "**Please Write University/Board ");
              countErr++;
          }
          if (inputyr_passIn == "" || inputyr_passIn == null) {
              seterror("#passInErr", "**Please Write Year of Passout ");
              countErr++;
          }
          if (inputyr_passOut == "" || inputyr_passOut == null) {
              seterror("#passOutErr", "**Please Write Year of Passout ");
              countErr++;
          }
          if (inputPercent == "" || inputPercent == null) {
              seterror("#percenErr", "**Please Write Percentage ");
              countErr++;
          }

          console.log(countErr);
          if (countErr > 0) {
              return false;
          } else {
              return true;
          }
      }

      function clearerrorsEducation() {
          $("#courseErr").hide();
          $("#instituteErr").hide();
          $("#ubErr").hide();
          $("#passInErr").hide();
          $("#passOutErr").hide();
          $("#percenErr").hide();
      }

      function seterror(id, message) {
          $(id).text(message);
          $(id).show();
        }
        
      //  Validation For Documents tab. 

      function validateformThird() {
          countErr = 0;
          clearerrorsDoc();

          var inputPanNum = $('#pan-num').val();
          var inputPanCard = $('#Pan-photo').val();
          var inputAadhaarNum = $('#aadhaar-num').val();
          var inputAadhaarCard = $('#AadhaarPhoto').val();
          var inputProfilePic = $('#ProfilPic').val();
          var inputBankName = $('#bank_name').val();
          var inputBankAcc = $('#bank_acc').val();
          var inputIfscCode = $('#ifsc_code').val();

          var regxaadhaar = /^[2-9]{1}[0-9]{11}$/;

          if (inputPanNum == "" || inputPanNum == null) {
              seterror("#panNumErr", "**Please Write Pan Number ");
              countErr++;
          }
          if (inputPanCard == "" || inputPanCard == null) {
              seterror("#PanPicErr", "**Please Select Pan Card ");
              countErr++;
          }
          if (inputAadhaarNum == "" || inputAadhaarNum == null) {
              seterror("#aadhaarNumErr", "**Please Write Aadhaar Number ");
              countErr++;
          } else if (!regxaadhaar.test(inputAadhaarNum)) {
              seterror("#aadhaarNumErr", "**Please Enter Valid Aadhaar Number");
              countErr++;
          }
          if (inputAadhaarCard == "" || inputAadhaarCard == null) {
              seterror("#aadhaarPicErr", "**Please Select Aadhaar Card ");
              countErr++;
          }
          if (inputProfilePic == "" || inputProfilePic == null) {
              seterror("#profilePicErr", "**Please Select Profile Pic");
              countErr++;
          }
          if (inputBankName == "" || inputBankName == null) {
              seterror("#bankNameErr", "**Please Write Your Bank Name");
              countErr++;
          }
          if (inputBankAcc == "" || inputBankAcc == null) {
              seterror("#bankAccErr", "**Please Write Bank Number");
              countErr++;
          }
          if (inputIfscCode == "" || inputIfscCode == null) {
              seterror("#ifscErr", "**Please Write IFSC Code");
              countErr++;
          }
          console.log(countErr);
          if (countErr > 0) {
              return false;
          } else {
              return true;
          }
      }

      function clearerrorsDoc() {
          $("#panNumErr").hide();
          $("#PanPicErr").hide();
          $("#aadhaarNumErr").hide();
          $("#aadhaarPicErr").hide();
          $("#profilePicErr").hide();
          $("#bankNameErr").hide();
          $("#bankAccErr").hide();
          $("#ifscErr").hide();
      }

      function seterror(id, message) {
          $(id).text(message);
          $(id).show();
      }
  </script>
<!-- Session_Start -->
<?php session_start(); 

$userRole = $_SESSION['user_role'];
?>

<!--DB_conection -->
<?php include 'empDB.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $eduDetails = "SELECT * FROM educational_details WHERE user_id = $id ";
    $userEduDetails = mysqli_query($connections, $eduDetails);
    $selectData = "SELECT name, emails, phone, user_role, father_name, mother_name, father_contact_number, present_address, city, pin_code, premanent_address, permanent_city, permanent_pincode, dob, alternative_phone, date_of_joining, interview_date, training_period, primary_skill, pan, pan_card_image, aadhaar, aadhaar_card_image, profile_pic, bank_name, account_number,  ifsc_code, qualification, course, institute, university_board, year_start, year_end, percentage, marksheet_photo FROM users LEFT JOIN educational_details ON users.id = educational_details.user_id WHERE users.id= $id";

    $SafeData = mysqli_query($connections, $selectData);
    $changes = mysqli_fetch_array($SafeData);
}

$userName = "SELECT id, name FROM users ";
$userDetails = mysqli_query($connections, $userName);

?>
<!-- Header -->
<?php include 'header.php'; ?>
<!-- End of Header -->
<div class="container-fluid">
    <div class="card shadow">
        <div class="row card-header justify-content-between">
            <h6 class="font-weight-bold text-primary">Emplyees Perfomance</h6>
        </div>
        <div class="card-body border-bottom-primary">

            <form action="update.php" onsubmit="return validateform()" method="POST">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Employees Name</b></label>
                    <div class="col-sm-6">
                        <input value="" type="hidden" id="userId" name="myid">
                        <select id="empName" class="form-control" aria-label="Default select example">
                            <option></option>
                            <?php while ($changes = mysqli_fetch_array($userDetails)) { ?>
                                <option value="<?= $changes['id'] ?>"><?= $changes['name'] ?></option>
                            <?php } ?>
                        </select>
                        <span id="employeesErr"></span>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Ratings</b></label>
                    <div class="col-sm-1 col-form-label">
                        <input id="rating" class="form-control" name="rating" type="number" <?php if ($userRole == 2 ){ ?> readonly= "readonly" <?php } ?>>
                    </div><b>(Out Of 5)</b>
                    <span id="ratingError"></span>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" style="color: rgba(47, 16, 139, 0.582);"><b>Remarks</b></label>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="ratingRemark" rows="3" placeholder="Describe Your Experience" name="ratingRemark" <?php if ($userRole == 2 ){ ?> readonly= "readonly"  <?php } ?>></textarea>
                    </div>
                </div>

                <?php if ($userRole == 1 ){ ?>
                <div class="col-form-label">
                    <button type="submit" class="btn btn-primary btn-sm" name="saveRatings">Save</button>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>

<!-- footer -->
<?php include 'footer.php'; ?>
<!-- End of Footer -->

<script>
    $('#empName').on('change', function() {

        var empId = $('#empName').val();
        $('#userId').val(empId);
        
        $.ajax({
            url: 'modal_update.php',
            method: 'GET',
            data: {
                'id': empId,
                'tableName': "users"
            },
            dataType: 'json',
            success: function(response) {
            // console.log(response);
            $('#rating').val(response.rating);
            $('#ratingRemark').text(response.remark);
            
            }
        });
    });

    function validateform() {
        console.log("0");
        countErr = 0;
        clearerrors();
        var ratings = $('#rating').val();

        if(ratings <= 0 || ratings > 5) {
            seterror("#ratingError", "**Please Give Valid Rating");
            countErr++;
        }

        console.log(countErr);
        if (countErr > 0) {
            console.log("2");
            return false;
        } else {
            console.log("3");
            return true;
        }
    }
    function clearerrors() {
        $("#ratingError").hide();
    }

    function seterror(id, message) {
        $(id).text(message);
        $(id).show();
    }
</script>
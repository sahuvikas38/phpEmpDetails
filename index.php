<?php session_start(); 

 if(!isset($_SESSION['user_role'])){
    header ("Location: login.php");
 }
?>
<!-- Header -->
<?php include('header.php'); ?>
<!-- End of Header -->

<?//php echo($_SESSION['is_freezed']);
// die;
?>

<!-- Main Content -->
<div class="row col-12">
    <!--  name Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            NAME </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $_SESSION['name']?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-solid fa-user-tie fa-1x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- email add Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Email Address</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $_SESSION['emails']?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-at fa-1x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- phone Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Phone
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $_SESSION['phone']?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-sharp fa-solid fa-phone fa-1x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- userroles Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            User-Role</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if($_SESSION['user_role']== 1){ echo"Admin"; }else{ echo "Employee";}?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-solid fa-user-check fa-1x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($_SESSION['is_freezed'] == 1) {?>
<div class="container-fluid">
    <div class="card shadow">
        <div class="row card-header justify-content-between">
            <h6 class="font-weight-bold text-primary">Maintenance !</h6>
        </div>
        <div class="card-body border-bottom-dark">
            <div class="container">
                   <p><b>Your Account Has Been Freezed By Admin. So You Cannot Able To Access Your Data, For More Information Please Conatact Admin.</b></p>
            </div>
        </div>
    </div>
</div>
<?php } ?>
</div>
<!-- End of Main Content -->

<!-- footer -->
<?php include('footer.php'); ?>
<!-- End of Footer -->

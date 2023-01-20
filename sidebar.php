<?php include 'empDB.php'; ?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <!-- <div class="sidebar-brand-icon rotate-n-15"> -->
        <img src="img/k_white1.png" alt="Loading...." class="logo-1">
        <img src="img/klogo.png" class="logo-2" width="50px">
        <!-- </div> -->

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseFirst">
            <i class="fas fa-solid fa-users"></i>
            <span>Employees</span>
        </a>
        <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Employee :</h6>
                <?php if ($_SESSION['user_role'] == 1) { ?>
                    <a class="collapse-item" href="edit.php">Profile</a>
                    <a class="collapse-item" href="all_employee.php">All Employees</a>
                    <a class="collapse-item" href="#">Add Employees</a>
                <?php } else{ ?>
                    <a class="collapse-item" href="edit.php">Profile</a>
                <?php }  ?>
                </div>

            </div>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Divider -->

        <?php if($_SESSION['is_freezed'] != 1) {?>
        <?php if ($_SESSION['user_role'] == 2) { ?>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseFirst">
                <i class="fas fa-solid fa-user-tie"></i>
                <span><?php echo $_SESSION['name'] ?></span>
            </a>

            <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Employee :</h6>
                    <a class="collapse-item" href="view_page.php?id=<?php echo $_SESSION['id'] ?>">My Details</a>
                    <!-- <a class="collapse-item" href="register.php">Add Employees</a> -->
                </div>
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Divider -->
        <?php } ?>
        <?php } ?>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseSecond">
            <i class="fas fa-user-tag"></i>
            <span>User Roles</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Roles :</h6>
                <a class="collapse-item" href="#">Admin</a>
                <a class="collapse-item" href="#">Employees</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <?php if($_SESSION['is_freezed'] != 1) {?>
    <?php
     $selectList = "SELECT id FROM users";
     $data = mysqli_query($connections, $selectList);
     $appraisalId = mysqli_num_rows($data);
     ?>
    <li class="nav-item">
        <a class="nav-link" href="appraisal.php?id=<?php echo $appraisalId ?>">
        <i class="fas fa-solid fa-chart-line"></i>
            <span>Appraisal</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <?php } ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-solid fa-flag"></i>
            <span>Reports</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
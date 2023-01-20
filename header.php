<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kitech || DashBoard</title>

    <!-- Custom fonts for this template-->
    <link href="css/all_min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/fontawesome-free/css/fontawesom_5_all.min.css">

    <link href="css/fonts_googleapis_com.css" rel="stylesheet">

    <!-- bootstrap 5 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2_min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/dataTables_bootstrap4_min.css" rel="stylesheet">
    <link href="css/appraisal.css">
    <style>

    .spanTag {
        color: red;
    }
    .requiredStar {
        color: red;
    }
    #ratingError {
        color: red;
    }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- sideBar  -->
       <?php
       include('sidebar.php');
       ?>
       <!-- End of sidebar -->
      
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include('topbar.php');
                ?>
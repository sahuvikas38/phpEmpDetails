<?php 
session_start();

 include('empDB.php');
 if(isset($_POST['logins'])){
   
    $Ulog = $_POST['userEmail'];
    $Plog = $_POST['pswrd'];

    $loGin = "SELECT * FROM users WHERE emails ='" . mysqli_real_escape_string($connections, $Ulog) . "' AND password ='" . mysqli_real_escape_string($connections, $Plog) . "' ";
    $loginFire = mysqli_query($connections, $loGin);
    $userData = mysqli_fetch_array($loginFire);
    $loginCheck = mysqli_num_rows($loginFire);

    if ($loginCheck){

        $_SESSION['id'] = $userData['id'];
        $_SESSION['name'] = $userData['name'];
        $_SESSION['emails'] = $userData['emails'];
        $_SESSION['phone'] = $userData['phone'];
        $_SESSION['user_role'] = $userData['user_role'];
        $_SESSION['is_freezed'] = $userData['is_freezed'];

        header("Location: index.php");
    }

 }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitech || Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <style>
    span {
        color: red;
    }

    body {
        background: #dfe9f5;
    }
    </style>

</head>

<body class="bg-gradient-primary">
    <div class="container" style="padding:50px;">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="img/emp.jpg" width="100%">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="img/kitech.png" width="40%">
                                    </div>
                                    <br>
                                    <?php
                                        if(isset($_POST['Logouts'])){
                                            session_destroy();
                                            echo "<h5 style='color: rgba(214, 21, 21);'><b> YOU HAVE BEEN LOG OUT </b></h5>";
                                        }
                                    ?>
                                    <form action="" onsubmit="return validateform()" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="emailAdd"
                                                placeholder="Enter Email Address..." name="userEmail">
                                            <span id="userErr"></span>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="passwords"
                                                placeholder="Password" name="pswrd">
                                            <span id="passErr"></span>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-warning col-12" name="logins">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- <script src="jQueryValidation.js"></script> -->
    <script>
    function validateform() {
        countErr = 0;
        clearerrors();
        var emails = $('#emailAdd').val();
        var passw = $('#passwords').val();
        var emailchecks = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;

        if (emails == "" || emails == null) {
            seterror("#userErr", "**Please Fill Email ");
            countErr++;
        } else if (!emailchecks.test(emails)) {
            seterror("#emailErr", "**Please Enter Valid Email-Address");
            countErr++;
        }
        if (passw == "" || passw == null) {
            seterror("#passErr", "**Please Fill Password ");
            countErr++;
        }
        console.log(countErr);
        if (countErr > 0) {
            return false;
        } else {
            return true;
        }
    }

    function clearerrors() {
        $("#userErr").hide();
        $("#passErr").hide();
    }

    function seterror(id, message) {
        $(id).text(message);
        $(id).show();
    }
    </script>
</body>

</html>
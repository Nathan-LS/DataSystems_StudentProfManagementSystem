<?php
require_once(dirname(__FILE__)."/class/permissions.php");
$permissions = new permissions(0);
$permissions->can_access();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/sidebar1.css">
</head>

<body style="background-color:rgb(30,28,28);">
    <?php include "additional/navbar.php" ?>
    <div class="container d-flex justify-content-center align-items-center align-content-center" style="margin-top:15vh;background-color:rgba(0,0,0,0);margin-right:30%;margin-left:30%;">
        <div class="d-flex justify-content-center align-items-center align-content-center align-self-center" id="login_cont" style="width:100%;height:100%;background-color:#a7a7a7;border-radius:10px;">
            <form method="post" action="php_actions/login.php" id="login_form" style="width:80%;background-color:transparent;">
                <div>
                    <h1 class="text-center"><i class="fa fa-key"></i></h1>
                    <h1 class="text-center">Log In</h1>
                </div>
                <div style="margin:49px;margin-top:40px;">
                    <div class="form-group"><label style="font-size:23px;">Log In As:</label><select required autofocus name="login_type" class="form-control"><option value="Student" selected>Student</option><option value="Professor">Professor</option></select></div>
                    <div class="form-group"><input type="password" name="login_id" required placeholder="Prof SSN or Student ID" autofocus class="form-control" /></div><button class="btn btn-primary" type="submit" id="login_button" style="width:100%;">LogIn</button>
                    <div style="margin-top:50px;"></div><button class="btn btn-primary" type="button" id="register_button" style="width:100%;background-color:rgb(28,50,74);">Register as Student</button></div>
            </form>
        </div>
    </div>
    <?php include "additional/modals.php" ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/project_logic.js"></script>
</body>

</html>
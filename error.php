<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>332 Project Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/sidebar1.css">
</head>

<body style="background-color:rgb(88,88,88);">
<?php include "additional/navbar.php" ?>
<div class="container d-flex justify-content-center align-items-center align-content-center align-self-center" style="margin-top:10%;background-color:#b4b0b0;height:auto;width:auto;margin-right:30%;margin-left:30%;">
    <div class="d-flex justify-content-center align-items-center align-content-center align-self-center" style="width:95%;height:95%;background-color:transparent;margin-bottom:15px;">
        <div class="row" style="width:95%;height:auto;">
            <div class="col" style="width:95%;height:auto;">
                <h1 class="text-center" style="width:100%;height:93px;font-size:33px;margin-bottom:37px;"><br /><i class="fa fa-warning" style="color:rgb(249,15,15);"></i>An Error Has Occured<br /><br /></h1>
                <?php
                if (isset($_SESSION['error_message'])) {
                    $error_message = $_SESSION['error_message'];
                    unset($_SESSION['error_message']);
                }
                else{
                    $error_message = "An unknown error has occurred.";
                }
                ?>
               <p id="error_text" style="font-size:27px;color:rgb(30,25,25);"><?php echo $error_message?></p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/project_logic.js"></script>
</body>

</html>
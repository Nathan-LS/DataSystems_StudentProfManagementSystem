<?php
session_start();
?>
<!DOCTYPE html>
<nav class="navbar navbar-dark navbar-expand-md bg-dark" style="height:70px;margin-bottom:0;">
    <div class="container-fluid"><a href="index.php" class="navbar-brand text-light" style="margin-right:24px;font-size:26px;">332 Project</a><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div
                class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav" style="font-size:25px;">
                <li role="presentation" class="nav-item"><a href="student.php" class="nav-link">Students<i class="fa fa-mortar-board" style="margin-left:5px;"></i></a></li>
                <li role="presentation" class="nav-item"><a href="professor.php" class="nav-link">Professors<i class="fa fa-pencil" style="margin-left:5px;"></i></a></li>

            </ul>
            <?php
            if (empty($_SESSION['access_level'])){
            echo '<a class="btn btn-primary ml-auto" role="button" href="login.php">login<i class="fa fa-key" style="margin-left:7px;"></i></a></div>';
            }
            else{
                echo '<a class="btn btn-primary ml-auto" role="button" href="php_actions/logout.php" style="background-color:rgb(42,8,18);">logout<i class="fa fa-sign-out" style="margin-left:7px;"></i></a>';
            }
            ?>
    </div>
</nav>
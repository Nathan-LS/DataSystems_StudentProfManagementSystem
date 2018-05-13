<?php
require("../config.php");
require (dirname(__FILE__)."/../class/response.php");

session_start();
$response = new response();

if (isset($_SESSION['access_level'])){
    $response->setError(true);
    $response->setMessage("You are already logged in");
    echo $response;
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    try {
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($_POST['login_type'] == "Professor"){
            $sql = $con->prepare("SELECT * FROM `professors` WHERE p_ssn = :login_id");
            $sql->execute(array(login_id=>$_POST['login_id']));
            $row = $sql->fetch();
            if ($row){
                $_SESSION['fname'] = $row['p_name'];
                $_SESSION['lname'] = "";
                $_SESSION["access_level"] = 2;
                $_SESSION['id'] = $row['p_ssn'];
                $response->setError(false);
                $response->setMessage("Hello $row[1]. You are now logged in!");
                $response->setLink("professor.php");
                echo $response;
            }
            else{
                $response->setError(true);
                $response->setMessage("You entered an incorrect username or password for professor.");
                echo $response;
            }
        } else if ($_POST['login_type'] == "Student") {
            $sql = $con->prepare("SELECT * FROM `student` WHERE cwid = :login_id");
            $sql->execute(array(login_id => $_POST['login_id']));
            $row = $sql->fetch();
            if ($row) {
                $_SESSION['fname'] = $row['s_fname'];
                $_SESSION['lname'] = $row['s_lname'];
                $_SESSION["access_level"] = 1;
                $_SESSION['id'] = $row['cwid'];
                $response->setError(false);
                $response->setMessage("Hello $row[1] $row[2]. You are now logged in!");
                $response->setLink("student.php");
                echo $response;
            } else {
                $response->setError(true);
                $response->setMessage("You entered an incorrect username or password for student.");
                echo $response;
            }
        } else {
            $response->setError(true);
            $response->setMessage("You can only login to type of student or professor.");
            echo $response;
        }
        $sql = null;
    }
    catch (PDOException $ex){
        $response->setError(true);
        $response->setMessage("Something went wrong when attempting to access the database.");
        echo $response;
        die();
    }
}
else{
    header('location:../index.php');
    die();
}
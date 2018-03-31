<?php
require("../config.php");
require ("../class/response.php");

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
                $_SESSION['fname'] = $row['p_fname'];
                $_SESSION['lname'] = $row['p_lname'];
                $_SESSION["access_level"] = 2;
                $response->setError(false);
                $response->setMessage("Hello $row[1] $row[2]. You are now logged in!");
                $response->setLink("professor.php");
                echo $response;
            }
            else{
                $response->setError(true);
                $response->setMessage("You entered an incorrect username or password for professor.");
                echo $response;
            }
            $sql = null;
        }
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
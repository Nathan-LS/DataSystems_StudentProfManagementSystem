<?php
require_once(dirname(__FILE__)."/../config.php");
require_once(dirname(__FILE__)."/../class/response.php");
require_once(dirname(__FILE__)."/../class/permissions.php");

$response = new response();
$permissions = new permissions(2);
$permissions->can_access();

function parse_input($data, bool $required){
    $data = trim($data);
    $data = htmlspecialchars($data);
    if ($required && empty($data)){
        global $response;
        $response->setError(true);
        $response->setMessage("You are missing input for a required field");
        echo $response;
        die();
    }
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    try {
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        foreach($_POST as $key => $value){
            $_POST[$key] = parse_input($value,true);
        }
        $sql = $con->prepare("INSERT INTO `professors` (`p_ssn`, `p_fname`, `p_lname`, `p_phone`, `p_sex`, `p_title`, `p_salary`) VALUES (:p_ssn, :p_fname, :p_lname, :p_phone, :p_sex, :p_title, :p_salary)");
        $sql->execute($_POST);
        $sql = null;

        $response->setError(false);
        $response->setMessage("Successfully added a new professor.");
        echo "$response";
    }
    catch (PDOException $ex){
        $response->setError(true);
        if ($ex->errorInfo[1] == 1062){
            $response->setMessage("This user already exists in the system.");
        }
        else{
            $response->setMessage("Something went wrong when attempting to submit data to the database.");
        }
        echo "$response";
        die();
    }
}
else{
    header('location:../index.php');
    die();
}
?>
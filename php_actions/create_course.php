<?php
require_once(dirname(__FILE__) . "/../config.php");
require_once(dirname(__FILE__) . "/../class/response.php");
require_once(dirname(__FILE__) . "/../class/permissions.php");
require_once(dirname(__FILE__) . "/input_checks.php");

$response = new response();
$permissions = new permissions(2);
$permissions->can_access();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        foreach ($_POST as $key => $value) {
            $_POST[$key] = parse_input($value, true);
        }
        $sql = $con->prepare("INSERT INTO `course` (`c_id`,`c_title`,`c_textbook`,`c_units`,`c_dept`) VALUES (:c_id,:c_title,:c_textbook,:c_units,:c_dept)");
        $sql->execute($_POST);
        $sql = null;

        $response->setError(false);
        $response->setMessage("Successfully added a new course.");
        echo "$response";
    } catch (PDOException $ex) {
        $response->setError(true);
        if ($ex->errorInfo[1] == 1062) {
            $response->setMessage("This course id already exists in the system.");
        } else {
            $response->setMessage("Something went wrong when attempting to submit data to the database.");
        }
        echo "$response";
        die();
    }
} else {
    header('location:../index.php');
    die();
}
?>
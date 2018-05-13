<?php
require_once(dirname(__FILE__) . "/../config.php");
require_once(dirname(__FILE__) . "/../class/response.php");
require_once(dirname(__FILE__) . "/../class/permissions.php");
require_once(dirname(__FILE__) . "/input_checks.php");

$response = new response();
$permissions = new permissions(0);
$permissions->can_access();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $split = parse_keys($_POST['enrolled_section']);
        $_POST['enrolled_course'] = $split[0];
        $_POST['enrolled_section'] = $split[1];
        foreach ($_POST as $key => $value) {
            $_POST[$key] = parse_input($value, true);
        }
        $sql = $con->prepare("INSERT INTO `enrollment` (`enrolled_course`,`enrolled_section`,`enrolled_student`) VALUES (:enrolled_course,:enrolled_section,:enrolled_student)");
        $sql->execute($_POST);
        $sql = null;
        $response->setError(false);
        $response->setMessage("Successfully enrolled in a new course");
        echo "$response";
    } catch (PDOException $ex) {
        $response->setError(true);
        if ($ex->errorInfo[1] == 1062) {
            $response->setMessage("You are already enrolled in this course");
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
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
        $sql = $con->prepare("INSERT INTO `professor_degrees` (`p_ssn_fk`, `degree`) VALUES (:p_ssn_fk, :degree)");
        $sql->execute($_POST);
        $sql = null;
        $response->setError(false);
        $response->setMessage("Successfully added the degree to professor.");
        echo "$response";
    } catch (PDOException $ex) {
        $response->setError(true);
        if ($ex->errorInfo[1] == 1062) {
            $response->setMessage("This professor already has this degree registered");
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
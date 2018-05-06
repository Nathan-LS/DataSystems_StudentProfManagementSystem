<?php
require_once(dirname(__FILE__) . "/../config.php");
require_once(dirname(__FILE__) . "/../class/response.php");
require_once(dirname(__FILE__) . "/../class/permissions.php");

//$response = new response();
//$permissions = new permissions(2);
//$permissions->can_access();

function getProfessors()
{
    try {
        global $host, $port, $dbname, $username, $password;
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("SELECT * FROM professors;");
        $sql->execute($_POST);
        $result = $sql->fetchAll();
        $sql = null;
        return $result;
    } catch (PDOException $ex) {
        return null;
    }
}

getProfessors();
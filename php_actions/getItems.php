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
        return array();
    }
}

function getDepartments()
{
    try {
        global $host, $port, $dbname, $username, $password;
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("SELECT * FROM department;");
        $sql->execute($_POST);
        $result = $sql->fetchAll();
        $sql = null;
        return $result;
    } catch (PDOException $ex) {
        return array();
    }
}

function getCourses()
{
    try {
        global $host, $port, $dbname, $username, $password;
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("SELECT * FROM course;");
        $sql->execute($_POST);
        $result = $sql->fetchAll();
        $sql = null;
        return $result;
    } catch (PDOException $ex) {
        return array();
    }
}

function getStudents()
{
    try {
        global $host, $port, $dbname, $username, $password;
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("SELECT * FROM student;");
        $sql->execute($_POST);
        $result = $sql->fetchAll();
        $sql = null;
        return $result;
    } catch (PDOException $ex) {
        return array();
    }
}

function getClassrooms()
{
    try {
        global $host, $port, $dbname, $username, $password;
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("SELECT * FROM classrooms;");
        $sql->execute($_POST);
        $result = $sql->fetchAll();
        $sql = null;
        return $result;
    } catch (PDOException $ex) {
        return array();
    }
}
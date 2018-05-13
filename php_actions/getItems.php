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

function getSections($teaching_only = False)
{
    if ($teaching_only) {
        $permissions = new permissions(2);
        if ($permissions->isProfessor()) {
            try {
                global $host, $port, $dbname, $username, $password;
                $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $con->prepare("SELECT * FROM course_sections LEFT JOIN course c on course_sections.course_fkey = c.c_id LEFT JOIN professors p on course_sections.instructor = p.p_ssn WHERE p.p_ssn=:self_id;");
                $sql->bindValue(':self_id', $_SESSION['id']);
                $sql->execute();
                $result = $sql->fetchAll();
                $sql = null;
                return $result;
            } catch (PDOException $ex) {
                return array();
            }
        } else {
            return array();
        }
    } else {
        try {
            global $host, $port, $dbname, $username, $password;
            $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $con->prepare("SELECT * FROM course_sections LEFT JOIN course c on course_sections.course_fkey = c.c_id LEFT JOIN professors p on course_sections.instructor = p.p_ssn;");
            $sql->execute($_POST);
            $result = $sql->fetchAll();
            $sql = null;
            return $result;
        } catch (PDOException $ex) {
            return array();
        }
    }
}

function getStudents()
{
    $permissions = new permissions(0);
    if ($permissions->isProfessor()) {
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
    } else if ($permissions->isStudent()) {
        try {
            global $host, $port, $dbname, $username, $password;
            $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $con->prepare("SELECT * FROM student where `cwid` = :cwid");
            $sql->bindValue(':cwid', $_SESSION['id']);
            $sql->execute();
            $result = $sql->fetchAll();
            $sql = null;
            return $result;
        } catch (PDOException $ex) {

        }
    }
}

function getStudentsInSection($sec_id)
{
    try {
        global $host, $port, $dbname, $username, $password;
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("SELECT s.* FROM enrollment inner join student s on enrollment.enrolled_student = s.cwid WHERE enrolled_section=:sec_id;");
        $sql->bindValue(':sec_id', $sec_id);
        $sql->execute();
        $result = $sql->fetchAll();
        $sql = null;
        return $result;
    } catch (PDOException $ex) {
        return array();
    }
}

function getStudentGrade($section_id, $student_id)
{
    try {
        global $host, $port, $dbname, $username, $password;
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("SELECT grade from enrollment where enrolled_section=:sec_id and enrolled_student = :st_id");
        $sql->bindValue(':sec_id', $section_id);
        $sql->bindValue(':st_id', $student_id);
        $sql->execute();
        $result = $sql->fetch();
        $sql = null;
        return $result;
    } catch (PDOException $ex) {
        return false;
    }
}

function possibleGrades()
{
    global $host, $port, $dbname, $username, $password;
    $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $con->prepare("SHOW FIELDS FROM enrollment LIKE 'grade'");
    $sql->execute();
    $result = $sql->fetch();
    if ($result) {
        $parsed = str_replace(array("enum('", "')", "''"), array('', '', "'"), $result['Type']);
        $grades = explode("','", $parsed);
    }
    return $grades;
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
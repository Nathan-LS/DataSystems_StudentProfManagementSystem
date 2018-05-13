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
        $sql = $con->prepare("INSERT INTO `course_sections` (`course_fkey`,`section_num`,`classroom`,`instructor`) VALUES (:course_fkey,:section_num,:classroom,:instructor)");
        $sql->bindValue(':course_fkey', $_POST['course_fkey']);
        $sql->bindValue(':section_num', $_POST['section_num']);
        $sql->bindValue(':classroom', $_POST['classroom']);
        $sql->bindValue(':instructor', $_POST['instructor']);
        $sql->execute();
        foreach ($_POST as $key => $val) {
            if ($val == "on") {
                $sql = $con->prepare("INSERT INTO `class_meetings` (`meeting_course`,`meeting_section`,`day`,`start_time`,`end_time`) VALUE(:course_fkey,:section_num,:dayW,:start_time,:end_time)");
                $sql->bindValue(':course_fkey', $_POST['course_fkey']);
                $sql->bindValue(':section_num', $_POST['section_num']);
                $sql->bindValue(':dayW', $key);
                $sql->bindValue(':start_time', $_POST['start_time']);
                $sql->bindValue(':end_time', $_POST['end_time']);
                $sql->execute();
            }
        }
        $sql = null;
        $response->setError(false);
        $response->setMessage("Successfully added a new section.");
        echo "$response";
    } catch (PDOException $ex) {
        $response->setError(true);
        if ($ex->errorInfo[1] == 1062) {
            $response->setMessage("This section already exists in the system.");
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
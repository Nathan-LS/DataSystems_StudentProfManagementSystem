<?php
require_once(dirname(__FILE__) . "/../config.php");
require_once(dirname(__FILE__) . "/../class/response.php");
require_once(dirname(__FILE__) . "/../class/permissions.php");

function getProfessorClasses()
{
    $permissions = new permissions(2);
    try {
        global $host, $port, $dbname, $username, $password;
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("SELECT d_name,c_title,section_num,classroom,capacity,m_days,start_time,end_time from
  (
    SELECT *
    FROM course_sections
      inner join course c on course_sections.course_fkey = c.c_id
      inner join department d on c.c_dept = d.d_num
      inner join classrooms c2 on course_sections.classroom = c2.room_id
    WHERE instructor = :prof_id
  ) teaching inner join
  (
    SELECT
      meeting_section,
      GROUP_CONCAT(substr(day, 1, 2) SEPARATOR '') as m_days,
      start_time,
      end_time
    from class_meetings
    group by meeting_section
  )meetings on teaching.section_num=meetings.meeting_section;");
        $sql->bindValue('prof_id', $permissions->getID());
        $sql->execute();
        $result = $sql->fetchAll();
        $sql = null;
        return $result;
    } catch (PDOException $ex) {
        return array();
    }
}

function getAVsections($c_id)
{
    try {
        global $host, $port, $dbname, $username, $password;
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("SELECT c_title,section_num,classroom,total_enrolled,capacity,m_days,start_time,end_time from
  (
    SELECT *,(SELECT count(*) FROM enrollment WHERE enrolled_section=section_num) as total_enrolled
    FROM course_sections
      inner join course c on course_sections.course_fkey = c.c_id
      inner join department d on c.c_dept = d.d_num
      inner join classrooms c2 on course_sections.classroom = c2.room_id
    WHERE c_id = :c_id
  ) c_s inner join
  (
    SELECT
      meeting_section,
      GROUP_CONCAT(substr(day, 1, 2) SEPARATOR '') as m_days,
      start_time,
      end_time
    from class_meetings
    group by meeting_section
  )meetings on c_s.section_num=meetings.meeting_section;");
        $sql->bindValue(':c_id', $c_id);
        $sql->execute();
        $result = $sql->fetchAll();
        $sql = null;
        return $result;
    } catch (PDOException $ex) {
        return array();
    }
}

function getGradeCount($section_id)
{
    try {
        global $host, $port, $dbname, $username, $password;
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("SELECT grade,count(*) as total from enrollment WHERE enrolled_section = :section_id group by grade;");
        $sql->bindValue(':section_id', $section_id);
        $sql->execute();
        $result = $sql->fetchAll();
        $sql = null;
        return $result;
    } catch (PDOException $ex) {
        return array();
    }
}

function getStudentGrades()
{
    try {
        $permissions = new permissions(1);
        global $host, $port, $dbname, $username, $password;
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $con->prepare("SELECT concat(c_title,' (',enrolled_section,')') as course, grade FROM
enrollment
  inner join course_sections cs on enrollment.enrolled_section = cs.section_num
  inner join course c on cs.course_fkey = c.c_id
WHERE enrolled_student = :student_id;

");
        $sql->bindValue(':student_id', $permissions->getID());
        $sql->execute();
        $result = $sql->fetchAll();
        $sql = null;
        return $result;
    } catch (PDOException $ex) {
        return array();
    }
}

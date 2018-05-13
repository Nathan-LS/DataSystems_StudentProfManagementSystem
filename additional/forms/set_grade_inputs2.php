<!DOCTYPE html>
<body>
<div id="enrolled_student_grade" style="width:100%;height:100%;"><select name="grade" required="" autofocus=""
                                                                         style="width:100%;height:100%;">
        <option disabled selected value> Change Grade</option>
        <?php
        require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
        $current_grade = getStudentGrade($_POST['enrolled_section'], $_POST['student_id']);
        $current_grade = $current_grade['grade'];
        foreach (possibleGrades() as $grades) {
            if ($grades == $current_grade) {
                echo "<option value=\"$grades\" selected>$grades</option>";
            } else {
                echo "<option value=\"$grades\">$grades</option>";
            }
        }
        ?>
    </select></div>
</body>

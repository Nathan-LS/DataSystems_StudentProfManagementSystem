<!DOCTYPE html>
<body>
<div id="enrolled_student_select" style="width:100%;height:100%;"><select name="enrolled_student" required=""
                                                                          autofocus="" id="enrolled_student"
                                                                          style="width:100%;height:100%;">
        <option disabled selected value> Select a Student</option>
        <?php
        require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
        foreach (getStudentsInSection($_POST['enrolled_section']) as $result) {
            $id = $result['cwid'];
            $name = $result['s_fname'] . " " . $result['s_lname'];
            echo "<option value=\"$id\">$name</option>";
        }
        ?>
    </select></div>
</body>

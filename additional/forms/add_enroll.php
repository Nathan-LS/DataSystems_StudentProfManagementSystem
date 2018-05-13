<!DOCTYPE html>
<body>
<form action="php_actions/add_enroll.php" method="post" id="s_form"
      style="margin:0px;padding-top:28px;padding-bottom:28px;width:80%;height:80%;margin-bottom:10px;">
    <h1 class="text-center" style="font-weight:bold;color:rgb(0,0,0);">Enroll in course section</h1>
    <div style="margin-top:34px;"></div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Student:</label></div>
            <?php
            require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
            require_once(dirname(__FILE__) . "/../../class/permissions.php");
            $permissions = new permissions(2);
            if ($permissions->isStudent()) { //if student can only enroll for self
                echo '<select name="enrolled_student" required class="form-control"><optgroup label="Student"></optgroup>';
                foreach (getStudents() as $result) {
                    $id = $result['cwid'];
                    $name = $result['s_fname'] . " " . $result['s_lname'];
                    echo "<option value=\"$id\">$name</option>";
                }
                echo '</select>';
            } else {
                echo '<div class="col"><select class="form-control" name="enrolled_student" required=""><optgroup label="Student"></optgroup>';
                foreach (getStudents() as $result) {
                    $id = $result['cwid'];
                    $name = $result['s_fname'] . " " . $result['s_lname'];
                    echo "<option value=\"$id\">$name</option>";
                }
                echo '</select>';
            }
            ?>
        </div>
    </div>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Course Section:</label></div>
            <div class="col"><select class="form-control" name="enrolled_section" required="">
                    <optgroup label="Course Section"></optgroup>
                    <?php
                    require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
                    foreach (getSections() as $result) {
                        $s_id = $result['section_num'];
                        $c_id = $result['course_fkey'];
                        $name = "Course: " . $result['c_title'] . " Section #: " . $result['section_num'] . " Professor: " . $result['p_name'];
                        echo "<option value=\"$c_id,$s_id\" selected>$name</option>";
                    }
                    ?>
                </select></div>
        </div>
    </div>
    <button class="btn btn-success" type="submit" id="create_submit"
            style="background-color:rgb(26,174,60);width:100%;">Enroll
    </button>
</form>
</body>

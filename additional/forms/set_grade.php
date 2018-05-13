<!DOCTYPE html>
<body>
<form action="php_actions/set_grade.php" method="post" id="s_form"
      style="margin:0px;padding-top:28px;padding-bottom:28px;width:80%;height:80%;margin-bottom:10px;">
    <h1 class="text-center" style="font-weight:bold;color:rgb(0,0,0);">Set Grade</h1>
    <div style="margin-top:34px;"></div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Course Section:</label></div>
            <div class="col"><select class="form-control" name="enrolled_section" required="" id="enrolled_section">
                    <option disabled selected value> Select a course section</option>
                    <?php
                    require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
                    foreach (getSections(true) as $result) {
                        $id = $result['section_num'];
                        $name = "Course: " . $result['c_title'] . " Section #: " . $result['section_num'] . " Professor: " . $result['p_name'];
                        echo "<option value=\"$id\">$name</option>";
                    }
                    ?>
                </select></div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Student:</label></div>
            <div class="col">
                <div class="container" id="load_grade_student"
                     style="width:100%;height:100%;margin-left:0px;margin-right:0px;"></div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Grade:</label></div>
            <div class="col">
                <div class="container" id="load_grade_student_currentgrade"
                     style="width:100%;height:100%;margin-right:0px;margin-left:0px;"></div>
            </div>
        </div>
    </div>
    <button class="btn btn-success" type="submit" id="create_submit"
            style="background-color:rgb(26,174,60);width:100%;">Set Grade
    </button>
</form>
</body>

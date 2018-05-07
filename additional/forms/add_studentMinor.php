<!DOCTYPE html>
<body>
<form action="php_actions/add_studentMinor.php" method="post" id="s_form"
      style="margin:0px;padding-top:28px;padding-bottom:28px;width:80%;height:80%;margin-bottom:10px;">
    <h1 class="text-center" style="font-weight:bold;color:rgb(0,0,0);">Add Student Minor</h1>
    <div style="margin-top:34px;"></div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Student:</label></div>
            <div class="col"><select class="form-control" name="student_m" required="">
                    <optgroup label="Student"></optgroup>
                    <?php
                    require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
                    foreach (getStudents() as $result) {
                        $id = $result['cwid'];
                        $name = $result['s_fname'] . " " . $result['s_lname'];
                        echo "<option value=\"$id\">$name</option>";
                    }
                    ?>
                </select></div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Minor Department:</label></div>
            <div class="col"><select class="form-control" name="minor_department" required="">
                    <optgroup label="Minor Department"></optgroup>
                    <?php
                    require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
                    foreach (getDepartments() as $result) {
                        $id = $result['d_num'];
                        $name = $result['d_name'];
                        echo "<option value=\"$id\">$name</option>";
                    }
                    ?>
                </select></div>
        </div>
    </div>
    <button class="btn btn-success" type="submit" id="create_submit"
            style="background-color:rgb(26,174,60);width:100%;">Add minor
    </button>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/project_logic.js"></script>
</body>

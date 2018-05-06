<!DOCTYPE html>
<body>
<form action="php_actions/add_preq.php" method="post" id="s_form"
      style="margin:0px;padding-top:28px;padding-bottom:28px;width:80%;height:80%;margin-bottom:10px;">
    <h1 class="text-center" style="font-weight:bold;color:rgb(0,0,0);">Add Course Prerequisite</h1>
    <div style="margin-top:34px;"></div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Add to this course:</label></div>
            <div class="col"><select class="form-control" name="preq_for" required="">
                    <optgroup label="Adding preq to"></optgroup>
                    <?php
                    require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
                    foreach (getCourses() as $result) {
                        $id = $result['c_id'];
                        $name = $result['c_title'];
                        echo "<option value=\"$id\">$name</option>";
                    }
                    ?>
                </select></div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">A prerequisite of this course:</label></div>
            <div class="col"><select class="form-control" name="preq_course" required="">
                    <optgroup label="Prerequisite"></optgroup>
                    <?php
                    require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
                    foreach (getCourses() as $result) {
                        $id = $result['c_id'];
                        $name = $result['c_title'];
                        echo "<option value=\"$id\">$name</option>";
                    }
                    ?>
                </select></div>
        </div>
    </div>
    <button class="btn btn-success" type="submit" id="create_submit"
            style="background-color:rgb(26,174,60);width:100%;">Add prerequisite&nbsp;
    </button>
</form>
</body>
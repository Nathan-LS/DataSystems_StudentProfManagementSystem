<!DOCTYPE html>
<body>
<form action="php_actions/create_course.php" method="post" id="s_form"
      style="margin:0px;padding-top:28px;padding-bottom:28px;width:80%;height:80%;margin-bottom:10px;">
    <h1 class="text-center" style="font-weight:bold;color:rgb(0,0,0);">Add Course</h1>
    <div style="margin-top:34px;"></div>
    <div class="form-group"><input class="form-control" type="number" name="c_id" placeholder="Course ID"></div>
    <div class="form-group"><input class="form-control" type="text" name="c_title" required=""
                                   placeholder="Course Title" autofocus=""></div>
    <div class="form-group"><input class="form-control" type="text" name="c_textbook" required=""
                                   placeholder="Course Textbook Name" autofocus=""></div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><input class="form-control" type="number" name="c_units" placeholder="Units" min="1"
                                    max="10"></div>
            <div class="col"><select class="form-control" name="c_dept">
                    <optgroup label="Department"></optgroup>
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
            style="background-color:rgb(26,174,60);width:100%;">Create
    </button>
</form>
</body>

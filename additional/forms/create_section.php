<!DOCTYPE html>
<body>
<form action="php_actions/create_section.php" method="post" id="s_form"
      style="margin:0px;padding-top:28px;padding-bottom:28px;width:80%;height:80%;margin-bottom:10px;">
    <h1 class="text-center" style="font-weight:bold;color:rgb(0,0,0);">Add Section</h1>
    <div style="margin-top:34px;"></div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Course:</label></div>
            <div class="col"><select class="form-control" name="course_fkey" required="" autofocus="">
                    <optgroup label="Course"></optgroup>
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
    <div class="form-group"><input class="form-control" type="number" name="section_num" required=""
                                   placeholder="Section Number" min="0"></div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Classroom</label></div>
            <div class="col"><select class="form-control" name="classroom" required="" autofocus="">
                    <optgroup label="Classroom"></optgroup>
                    <?php
                    require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
                    foreach (getClassrooms() as $result) {
                        $id = $result['room_id'];
                        $name = $result['room_id'] . "  capacity (" . ltrim($result['capacity'], '0') . ")";
                        echo "<option value=\"$id\">$name</option>";
                    }
                    ?>
                </select></div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Instructor</label></div>
            <div class="col"><select class="form-control" name="instructor" required="" autofocus="">
                    <optgroup label="Instructor"></optgroup>
                    <?php
                    require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
                    foreach (getProfessors() as $result) {
                        $id = $result['p_ssn'];
                        $name = $result['p_name'];
                        echo "<option value=\"$id\">$name</option>";
                    }
                    ?>
                </select></div>
        </div>
    </div>
    <div style="padding-top:33px;"></div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Start Time:</label></div>
            <div class="col"><input class="form-control" type="time" name="start_time" value="08:00:00" required="">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">EndTime:</label></div>
            <div class="col"><input class="form-control" type="time" name="end_time" value="10:00:00" required=""></div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <div class="form-check"><input class="form-check-input" type="checkbox" name="Monday" checked=""
                                               id="formCheck-1"><label class="form-check-label"
                                                                       for="formCheck-1">Monday</label></div>
            </div>
            <div class="col">
                <div class="form-check"><input class="form-check-input" type="checkbox" name="Tuesday" id="formCheck-1"><label
                            class="form-check-label" for="formCheck-1">Tuesday</label></div>
            </div>
            <div class="col">
                <div class="form-check"><input class="form-check-input" type="checkbox" name="Wednesday" checked=""
                                               id="formCheck-1"><label class="form-check-label" for="formCheck-1">Wednesday</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check"><input class="form-check-input" type="checkbox" name="Thursday"
                                               id="formCheck-1"><label class="form-check-label" for="formCheck-1">Thursday</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check"><input class="form-check-input" type="checkbox" name="Friday"
                                               id="formCheck-1"><label class="form-check-label"
                                                                       for="formCheck-1">Friday</label></div>
            </div>
            <div class="col">
                <div class="form-check"><input class="form-check-input" type="checkbox" name="Saturday"
                                               id="formCheck-1"><label class="form-check-label" for="formCheck-1">Saturday</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check"><input class="form-check-input" type="checkbox" name="Sunday"
                                               id="formCheck-1"><label class="form-check-label"
                                                                       for="formCheck-1">Sunday</label></div>
            </div>
        </div>
    </div>
    <button class="btn btn-success" type="submit" id="create_submit"
            style="background-color:rgb(26,174,60);width:100%;">Create
    </button>
</form>
</body>

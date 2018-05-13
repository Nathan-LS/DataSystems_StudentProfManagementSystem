<!DOCTYPE html>
<body>
<div id="s_form" style="width:100%;min-width:100%;max-width:100%;height:100%;min-height:100%;max-height:100%;">
    <div class="container"
         style="margin-right:0;margin-left:0;min-width:100%;min-height:100%;width:100%;max-width:100%;height:100%;max-height:100%;">
        <h1 class="text-center" style="font-weight:bold;color:rgb(0,0,0);">Available course sections</h1>
        <div style="margin-top:34px;">
            <div class="form-group">
                <div class="row">
                    <div class="col" style="width:100%;"><label class="col-form-label">Show sections for this
                            course:</label></div>
                    <div class="col"><select name="course_selection" required="" id="selection_Course"
                                             style="width:100%;height:100%;">
                            <optgroup label="Course"></optgroup>
                            <option disabled selected value> Select a course to view available sections</option>
                            <?php
                            require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
                            foreach (getCourses() as $result) {
                                $id = $result['c_id'];
                                $name = "Course: " . $result['c_title'] . ", Course ID: " . $result['c_id'];
                                echo "<option value=\"$id\">$name</option>";
                            }
                            ?>
                        </select></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="load_AVsections"
         style="width:100%;height:450px;min-width:100%;max-width:100%;min-height:0px;max-height:450px;margin-top:0px;margin-right:0px;margin-left:0px;"></div>
</div>
</body>
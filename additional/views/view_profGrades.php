<!DOCTYPE html>
<body>
<div id="s_form" style="width:100%;min-width:100%;max-width:100%;height:100%;min-height:100%;max-height:100%;">
    <div class="container"
         style="margin-right:0;margin-left:0;min-width:100%;min-height:100%;width:100%;max-width:100%;height:100%;max-height:100%;">
        <h1 class="text-center" style="font-weight:bold;color:rgb(0,0,0);">Class Grades</h1>
        <div style="margin-top:34px;">
            <div class="form-group">
                <div class="row">
                    <div class="col" style="width:100%;"><label class="col-form-label">Show grades for selected course
                            section:</label></div>
                    <div class="col"><select name="section_selected" required="" id="selection_Grades"
                                             style="width:100%;height:100%;">
                            <optgroup label="Course Section"></optgroup>
                            <option disabled selected value> Select a course section to view grades</option>
                            <?php
                            require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
                            foreach (getSections() as $result) {
                                $id_c = $result['c_id'];
                                $id_s = $result['section_num'];
                                $name = "Course:" . $result['c_title'] . " Course ID:" . $result['c_id'] . " Section ID:" . $result['section_num'];
                                echo "<option value=\"$id_c,$id_s\">$name</option>";
                            }
                            ?>
                        </select></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="load_GradeTable"
         style="width:100%;height:450px;min-width:100%;max-width:100%;min-height:0px;max-height:450px;margin-top:0px;margin-right:0px;margin-left:0px;"></div>
</div>
</body>
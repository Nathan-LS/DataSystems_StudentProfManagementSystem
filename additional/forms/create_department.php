<!DOCTYPE html>
<body>
<form action="php_actions/create_department.php" method="post" id="s_form"
      style="margin:0px;padding-top:28px;padding-bottom:28px;width:80%;height:80%;margin-bottom:10px;">
    <h1 class="text-center" style="font-weight:bold;color:rgb(0,0,0);">Add Department</h1>
    <div style="margin-top:34px;"></div>
    <div class="form-group"><input class="form-control" type="text" name="d_num" required=""
                                   placeholder="Department Number" autofocus=""></div>
    <div class="form-group"><input class="form-control" type="text" name="d_name" required=""
                                   placeholder="Department Name" autofocus=""></div>
    <div class="form-group"><input class="form-control" type="tel" name="d_phone" required="" placeholder="Phone Number"
                                   autofocus=""></div>
    <div class="form-group"><input class="form-control" type="text" name="d_location" required="" placeholder="Location"
                                   autofocus=""></div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Department Chair</label></div>
            <div class="col"><select class="form-control" name="d_chair">
                    <?php
                    require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
                    foreach (getProfessors() as $result) {
                        $ssn = $result['p_ssn'];
                        $name = $result['p_name'];
                        echo "<option value=\"$ssn\">$name</option>";
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

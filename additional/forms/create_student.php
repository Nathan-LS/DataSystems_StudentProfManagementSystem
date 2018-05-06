<!DOCTYPE html>
<html>
<body>
<form action="php_actions/create_student.php" method="post" id="s_form"
      style="margin:0px;padding-top:28px;padding-bottom:28px;width:80%;height:80%;margin-bottom:10px;">
    <h1 class="text-center" style="font-weight:bold;color:rgb(0,0,0);">Add Student</h1>
    <div style="margin-top:34px;"></div>
    <div class="form-group"><input class="form-control" type="password" name="cwid" required="" placeholder="Student ID"
                                   autofocus=""></div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><input class="form-control" type="text" name="s_fname" required="" placeholder="First Name"
                                    autofocus=""></div>
            <div class="col"><input class="form-control" type="text" name="s_lname" required="" placeholder="Last Name"
                                    autofocus=""></div>
        </div>
    </div>
    <div class="form-group"><input class="form-control" type="tel" name="s_phone" required=""
                                   placeholder="Telephone Number" autofocus=""></div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><input class="form-control" type="text" name="s_address" placeholder="Address"></div>
            <div class="col"><input class="form-control" type="text" name="s_city" placeholder="City"></div>
            <div class="col"><input class="form-control" type="text" name="s_state" placeholder="State"></div>
            <div class="col"><input class="form-control" type="number" name="s_zip" placeholder="ZIP"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="col"><label class="col-form-label">Major</label></div>
            <div class="col"><select class="form-control" name="s_major" required="" autofocus="">
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

<!DOCTYPE html>
<html>
<body>
<form action="php_actions/add_prof_degree.php" method="post" id="s_form"
      style="margin:0px;padding-top:28px;padding-bottom:28px;width:80%;height:80%;margin-bottom:10px;">
    <h1 class="text-center" style="font-weight:bold;color:rgb(0,0,0);">Add Professor Degree</h1>
    <div style="margin-top:34px;"></div>
    <div class="form-group"><select class="form-control" name="p_ssn_fk" required="">
            <?php
            require_once(dirname(__FILE__) . "/../../php_actions/getItems.php");
            foreach (getProfessors() as $result) {
                $ssn = $result['p_ssn'];
                $name = $result['p_name'];
                echo "<option value=\"$ssn\">$name</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group"><input class="form-control" type="tel" name="degree" required="" placeholder="Degree Name"
                                   autofocus=""></div>
    <button class="btn btn-success" type="submit" id="create_submit"
            style="background-color:rgb(26,174,60);width:100%;">Add&nbsp;degree to professor
    </button>
</form>
</body>

</html>
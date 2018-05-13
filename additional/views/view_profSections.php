<!DOCTYPE html>
<body>
<div class="container" id="s_form"
     style="margin-right:0;margin-left:0;min-width:100%;min-height:100%;width:100%;max-width:100%;height:100%;max-height:100%;">
    <h1 class="text-center" style="font-weight:bold;color:rgb(0,0,0);">My Classes</h1>
    <div style="margin-top:34px;"></div>
    <div style="height:450px;width:100%;max-height:600px;">
        <div class="table-responsive table-bordered" style="height:100%;width:100%;">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Department</th>
                    <th>Course Name</th>
                    <th>Course Section</th>
                    <th>Classroom</th>
                    <th>Capacity</th>
                    <th>Meeting Days</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
                </thead>
                <tbody>
                <?php
                require_once(dirname(__FILE__) . "/../../php_actions/getViews.php");
                foreach (getProfessorClasses() as $classes) {
                    $capacity = ltrim($classes[4], '0');
                    echo "<tr>
                            <td>$classes[0]</td>
                            <td>$classes[1]</td>
                            <td>$classes[2]</td>
                            <td>$classes[3]</td>
                            <td>$capacity</td>
                            <td>$classes[5]</td>
                            <td>$classes[6]</td>
                            <td>$classes[7]</td></tr>
                            ";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
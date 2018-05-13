<!DOCTYPE html>
<body>
<div class="container" id="s_form"
     style="margin-right:0;margin-left:0;min-width:100%;min-height:100%;width:100%;max-width:100%;height:100%;max-height:100%;">
    <h1 class="text-center" style="font-weight:bold;color:rgb(0,0,0);">My Student Class Grades</h1>
    <div style="margin-top:34px;"></div>
    <div style="height:450px;width:100%;max-height:600px;">
        <div class="table-responsive table-bordered" style="height:100%;width:100%;">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Course (Section ID)</th>
                    <th>Grade</th>
                </tr>
                </thead>
                <tbody>
                <?php
                require_once(dirname(__FILE__) . "/../../php_actions/getViews.php");
                foreach (getStudentGrades() as $courses) {
                    echo "<tr>
                            <td>$courses[0]</td>
                            <td>$courses[1]</td></tr>
                            ";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>